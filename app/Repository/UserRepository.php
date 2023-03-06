<?php

namespace App\Repository;

use App\Infrastructure\Interfaces\UserRepositoryInterface;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function getUsers()
    {
        return User::query()->orderByDesc('updated_at')->paginate(6);
    }

    public function save(object $user)
    {
        $user->save();

        return $user;
    }

    public function update(object $user)
    {
        return $user->save();
    }

    public function getRoles()
    {
        return Role::query()->select('name', 'id')->get();
    }

    public function delete(int $id)
    {
        User::findOrFail($id)->delete();
    }
}