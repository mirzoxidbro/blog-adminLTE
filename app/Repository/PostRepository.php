<?php

namespace App\Repository;

use App\Infrastructure\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use App\Models\User;

class PostRepository implements PostRepositoryInterface
{
    public function getPost()
    {
        if(auth()->user()->role->name == 'manager')
        {
            return Post::query()->select(['id', 'post', 'status', 'updated_at'])->orderByDesc('updated_at')->paginate(4);
        }

        return Post::query()->select(['id', 'post', 'status', 'updated_at'])->where('user_id', auth()->user()->id)->orderByDesc('updated_at')->get();
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
        $post->name = $data['post'];
        $post->email = $data['status'];
        $post->save();
    }

    public function delete(object $post)
    {
        $post->delete();
    }
}