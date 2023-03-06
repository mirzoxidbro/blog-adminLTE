<?php

namespace App\Http\UseCases\Post;

use App\Models\Post;

class UpdatePostUseCase extends BasePostUseCase
{
    public function execute(array $data, int $id)
    {
        $post = Post::findOrFail($id);
        $post->post = $data['post'];
        $post->status = $data['status'];
        $post->user_id = $data['user_id'];
        return $this->repository->update($post);
    }
}