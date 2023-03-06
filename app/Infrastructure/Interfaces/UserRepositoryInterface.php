<?php

namespace App\Infrastructure\Interfaces;

interface UserRepositoryInterface
{
    public function getUsers();

    public function getRoles();

    public function save(object $user);

    public function update(object $user);

    public function delete(int $id);
}