<?php

namespace Features\Core\Repos\Base;

use Features\Core\Repos\Interfaces\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{

    abstract public function model(): string;

    public function find(int $model_id)
    {
        return $this->model()::findOrFail($model_id);
    }

    public function getAll()
    {
        return $this->model()::all();
    }

    public function getAllWhere(array $conditions)
    {
        return $this->model()::where($conditions)->get();
    }

    public function store(array $data)
    {
        return $this->model()::create($data);
    }
}
