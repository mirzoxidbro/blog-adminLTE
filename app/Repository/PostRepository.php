<?php

namespace App\Repository;

use App\Infrastructure\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    public function getPost()
    {

    }

    public function save(array $data)
    {
        return Post::create($data);
    }

    public function show(int $id)
    {

    }

    public function update(array $data, int $id)
    {

    }

    public function delete(int $id)
    {

    }
}