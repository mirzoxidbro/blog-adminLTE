<?php

namespace App\Repository;

use App\Infrastructure\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use App\Models\User;

class PostRepository implements PostRepositoryInterface
{
    public function getPost()
    {
       return Post::query()->select(['id', 'post', 'status', 'updated_at'])->orderByDesc('updated_at')->paginate(4);
    }

    public function save(array $data)
    {
        return Post::create($data);
    }

    public function create()
    {
        return User::query()->select('name', 'id')->get();
    }

    public function update(array $data, int $id)
    {
        $post = Post::findOrFail($id);
        $post->name = $data['name'];
        $post->email = $data['email'];
        $post->save();
    }

    public function delete(int $id)
    {
        Post::findOrFail($id)->delete();
    }
}