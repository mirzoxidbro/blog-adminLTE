<?php

namespace App\Infrastructure\Interfaces;

interface PostRepositoryInterface
{
    public function getPost();

    public function save(array $data);

    public function show(int $id);

    public function update(array $data, int $id);

    public function delete(int $id);
}