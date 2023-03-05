<?php

namespace App\Http\UseCases\User;

class StoreUserUseCase extends BaseUserUseCase
{
    public function execute(array $data)
    {
        return $this->repository->save($data);
    }
}