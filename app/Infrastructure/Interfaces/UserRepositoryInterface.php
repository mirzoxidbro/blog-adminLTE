<?php

namespace App\Infrastructure\Interfaces;

interface UserRepositoryInterface
{
    public function getUsers();

    public function save(array $data);

    public function update(array $data, int $id);

    public function delete(int $id);
}