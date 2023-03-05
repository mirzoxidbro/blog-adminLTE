<?php

namespace App\Http\UseCases\User;

class UpdateUserUseCase extends BaseUserUseCase
{
    public function execute(array $data, int $id)
    {
        return $this->repository->update($data, $id);
    }
}