<?php

namespace App\Http\UseCases\User;

use App\Repository\UserRepository;

class BaseUserUseCase
{
    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}