<?php

namespace App\Http\UseCases\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreUserUseCase extends BaseUserUseCase
{
    public function execute(array $data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        return $this->repository->save($user);
    }
}