<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // $created = $storeUseCase->execute($request->validated());
        // if(!$created)
        // {
        //     return redirect()->back()->with('error', __('word.error_creating_word'));
        // }

        // return redirect()->route('mobile.word.index')->with('success', __('word.created_successfully'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('word'));
    }

    public function update(User $user, Request $request)
    {
        // $updated = $updateUseCase->execute($user->id, $request->validated());
        // if (!$updated) {
        //     return redirect()->back()->with('error', __('word.updating_error'));
        // }

        // return redirect()->route('mobile.word.index')->with('success', __('word.updated_successfully'));
    }

    public function destroy($user)
    {
        //    $deleteUseCase->execute($user);

        // return redirect()->route('mobile.word.index')->with('success', __('word.deleted_successfully'));
    }
}
