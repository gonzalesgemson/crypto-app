<?php

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function findById(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function create(array $data): ?Model
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): ?Model
    {
        $model = $this->model->find($id);

        if (! $model) {
            return null;
        }

        $model->update($data);

        return $model;
    }

    public function delete(int $id): bool
    {
        $model = $this->model->find($id);

        if (! $model) {
            return false;
        }

        return $model->delete();
    }
}