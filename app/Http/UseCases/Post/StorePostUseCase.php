<?php

namespace App\Http\UseCases\Post;

class StorePostUseCase extends BasePostUseCase
{
    public function execute(array $data)
    {
        return $this->repository->save($data);
    }
}