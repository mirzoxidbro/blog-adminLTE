<?php

namespace App\Http\UseCases\User;

use App\Models\Role;
use App\Models\User;

class UpdateUserUseCase extends BaseUserUseCase
{
    public function execute(array $data, int $id)
    {
        $user = User::findOrFail($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role_id = $data['role_id'];
        return $this->repository->update($user);
    }
}