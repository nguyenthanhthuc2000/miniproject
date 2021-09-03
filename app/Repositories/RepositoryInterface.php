<?php
namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Store
     * @param array $attributes
     * @return mixed
     */
    public function store($attributes = []);
    public function getAll();
}

