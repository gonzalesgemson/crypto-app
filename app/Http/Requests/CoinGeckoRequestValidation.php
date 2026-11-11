<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class CoinGeckoRequestValidation extends FormRequest
{
    private const ALLOWED_FIELDS = [
        'coins', 
        'currency'
    ];

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'coins' => array_map(
                fn ($coin) => strtolower(trim($coin)), 
                (array) $this->input('coins', [])
            ),
            'currency' => strtolower($this->input('currency', 'usd')),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'coins' => ['required', 'array', 'min:1', 'max:10'],
            'coins.*' => ['string', 'distinct', Rule::in(config('coingecko.allowed_coins'))],
            'currency' => ['sometimes', 'string', Rule::in(config('coingecko.allowed_currencies'))],
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                $unknown = array_diff(array_keys($this->all()), self::ALLOWED_FIELDS);

                if ($unknown) {
                    $validator->errors()->add(
                        'request',
                        'Unknown fields: ' . implode(', ', $unknown)
                    );
                }
            },
        ];
    }

    public function messages(): array
    {
        return [
            'coins.required' => 'The coins field is required.',
            'coins.array' => 'The coins field must be an array.',
            'coins.min' => 'The coins field must contain at least one coin.',
            'coins.max' => 'The coins field may not contain more than ten coins.',
            'coins.*.string' => 'Each coin must be a string.',
            'coins.*.distinct' => 'Duplicate coins are not allowed.',
            'coins.*.in' => 'The selected coin is invalid. Allowed coins: ' . implode(', ', config('coingecko.allowed_coins')),
            'currency.string' => 'The currency must be a string.',
            'currency.in' => 'The selected currency is invalid. Allowed currencies: ' . implode(', ', config('coingecko.allowed_currencies')),
        ];
    }
}
