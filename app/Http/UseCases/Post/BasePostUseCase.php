<?php

namespace App\Http\UseCases\Post;

use App\Repository\PostRepository;

class BasePostUseCase
{
    protected PostRepository $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }
}