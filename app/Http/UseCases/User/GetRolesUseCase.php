<?php

namespace App\Http\UseCases\User;

class GetRolesUseCase extends BaseUserUseCase
{
    public function execute()
    {
        return $this->repository->getRoles();
    }
}