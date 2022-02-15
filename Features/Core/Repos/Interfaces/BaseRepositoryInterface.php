<?php

namespace Features\Core\Repos\Interfaces;


interface BaseRepositoryInterface
{
    public function find(int $model_id);

    public function getAll();

    public function getAllWhere(array $conditions);

    public function store(array $data);
}
