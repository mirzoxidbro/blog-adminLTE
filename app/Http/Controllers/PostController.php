<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\UseCases\Post\CreatePostUseCase;
use App\Http\UseCases\Post\DeletePostUseCase;
use App\Http\UseCases\Post\GetPostUseCase;
use App\Http\UseCases\Post\StorePostUseCase;
use App\Http\UseCases\Post\UpdatePostUseCase;
use App\Http\UseCases\User\GetUserUseCase;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index(GetPostUseCase $useCase)
    {
        $posts = $useCase->execute();
        return view('post.index', compact('posts'));
    }

    public function create(GetUserUseCase $useCase)
    {
        $users = $useCase->execute();
        return view('post.create', compact('users'));
    }

    public function store(StorePostUseCase $useCase, StoreRequest $request)
    {
        $useCase->execute($request->validated());

        return redirect()->route('post.index');
    }

    public function edit(Post $post, GetUserUseCase $useCase)
    {
        if (! Gate::allows('update-post', $post)) {
            abort(403);
        }

        $users = $useCase->execute();

        return view('post.edit', compact('post', 'users'));
    }

    public function update(Post $post, UpdateRequest $request, UpdatePostUseCase $useCase)
    {
        if (! Gate::allows('update-post', $post)) {
            abort(403);
        }
        $useCase->execute($request->validated(), $post->id);
        return redirect()->route('post.index');
    }

    public function destroy(Post $post, DeletePostUseCase $useCase)
    {
        if (! Gate::allows('delete-post', $post)) {
            abort(403);
        }
        $useCase->execute($post);
        
        return redirect()->back();
    }
}
