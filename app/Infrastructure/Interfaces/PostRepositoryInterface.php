<?php

namespace App\Infrastructure\Interfaces;

interface PostRepositoryInterface
{
    public function getPost();

    public function save(array $data);

    public function getUsers();

    public function update(object $post);

    public function delete(object $post);
}