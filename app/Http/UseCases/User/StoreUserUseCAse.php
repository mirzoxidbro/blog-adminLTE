<?php

namespace App\Http\UseCases\User;

class StoreUserUseCase extends BaseUserUseCase
{
    public function execute(array $data)
    {
        dd($data);
        return $this->repository->save($data);
    }
}