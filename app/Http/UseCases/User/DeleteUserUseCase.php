<?php

namespace App\Http\UseCases\User;


class DeleteUserUseCase extends BaseUserUseCase
{
    public function execute(int $id)
    {
        return $this->repository->delete($id);
    }
}