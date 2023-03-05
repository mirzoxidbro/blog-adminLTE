<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\UseCases\User\DeleteUserUseCase;
use App\Http\UseCases\User\GetUserUseCase;
use App\Http\UseCases\User\StoreUserUseCase;
use App\Http\UseCases\User\UpdateUserUseCase;
use App\Models\User;
class UserController extends Controller
{
    public function index(GetUserUseCase $useCase)
    {
        $users = $useCase->execute();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserUseCase $useCase, StoreRequest $request)
    {
        $useCase->execute($request->validated());
        return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user, UpdateRequest $request, UpdateUserUseCase $useCase)
    {
        $useCase->execute($request->validated(), $user->id);
        return redirect()->route('user.index');
    }

    public function destroy(int $id, DeleteUserUseCase $useCase)
    {
        $useCase->execute($id);
        return redirect()->back();
    }
}
