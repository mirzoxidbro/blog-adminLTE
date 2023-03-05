<?php

namespace App\Repository;

use App\Infrastructure\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getUsers()
    {
        return User::query()->orderByDesc('updated_at')->paginate(6);
    }

    public function save(array $data)
    {
        return User::create($data);
    }

    public function update(array $data, int $id)
    {
        $user = User::findOrFail($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();
    }

    public function delete(int $id)
    {
        User::findOrFail($id)->delete();
    }
}