<?php

namespace App\Http\UseCases\Post;

class GetPostUseCase extends BasePostUseCase
{
    public function execute()
    {
        return $this->repository->getPost();
    }
}