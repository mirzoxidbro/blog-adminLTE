<?php

namespace App\Http\UseCases\Post;

class UpdatePostUseCase extends BasePostUseCase
{
    public function execute(array $data, int $id)
    {
        return $this->repository->update($data, $id);
    }
}