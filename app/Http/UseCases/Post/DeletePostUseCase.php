<?php

namespace App\Http\UseCases\Post;

class DeletePostUseCase extends BasePostUseCase
{
    public function execute(int $id)
    {
        return $this->repository->delete($id);
    }
}