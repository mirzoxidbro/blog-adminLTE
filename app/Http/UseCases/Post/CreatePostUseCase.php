<?php

namespace App\Http\UseCases\Post;

class CreatePostUseCase extends BasePostUseCase
{
    public function execute()
    {
        return $this->repository->create();
    }
}