<?php

namespace App\Http\UseCases\Post;

class DeletePostUseCase extends BasePostUseCase
{
    public function execute(object $post)
    {
        return $this->repository->delete($post);
    }
}