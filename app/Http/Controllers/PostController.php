<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\UseCases\Post\CreatePostUseCase;
use App\Http\UseCases\Post\DeletePostUseCase;
use App\Http\UseCases\Post\GetPostUseCase;
use App\Http\UseCases\Post\StorePostUseCase;
use App\Http\UseCases\Post\UpdatePostUseCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(GetPostUseCase $useCase)
    {
        $posts = $useCase->execute();
        return view('post.index', compact('posts'));
    }

    public function create(CreatePostUseCase $useCase)
    {
        $users = $useCase->execute();
        return view('post.create', compact('users'));
    }

    public function store(StorePostUseCase $useCase, StoreRequest $request)
    {
        $useCase->execute($request->validated());

        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post, UpdateRequest $request, UpdatePostUseCase $useCase)
    {
        $useCase->execute($request->validated(), $post->id);
        return redirect()->route('post.index');
    }

    public function destroy(int $id, DeletePostUseCase $useCase)
    {
        $useCase->execute($id);
        
        return redirect()->back();
    }
}
