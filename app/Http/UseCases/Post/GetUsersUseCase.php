<?php

namespace App\Http\UseCases\Post;

class GetUsersUseCase extends BasePostUseCase
{
    public function execute()
    {
        return $this->repository->getUsers();
    }
}