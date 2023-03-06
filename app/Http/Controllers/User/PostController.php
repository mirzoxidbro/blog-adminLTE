<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\UseCases\Post\CreatePostUseCase;
use App\Http\UseCases\Post\DeletePostUseCase;
use App\Http\UseCases\Post\GetPostUseCase;
use App\Http\UseCases\Post\StorePostUseCase;
use App\Http\UseCases\Post\UpdatePostUseCase;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;

class PostController extends Controller
{
    public function index(GetPostUseCase $useCase)
    {
        $posts = $useCase->execute();
        return view('userposts.index', compact('posts'));
    }

    public function create(CreatePostUseCase $useCase)
    {
        $users = $useCase->execute();
        return view('userposts.create', compact('users'));
    }

    public function store(StorePostUseCase $useCase, StoreRequest $request)
    {
        $useCase->execute($request->validated());

        return redirect()->route('userpost.index');
    }

    public function edit(Post $post)
    {
        if (! Gate::allows('update-post', $post)) {
            abort(403);
        }

        return view('userposts.edit', compact('post'));
    }

    public function update(Post $post, UpdateRequest $request, UpdatePostUseCase $useCase)
    {
        
        $useCase->execute($request->validated(), $post->id);
        return redirect()->route('userpost.index');
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
