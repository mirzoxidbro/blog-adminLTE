<?php

namespace App\Http\UseCases\User;

class GetUserUseCase extends BaseUserUseCase
{
    public function execute()
    {
        return $this->repository->getUsers();
    }
}