<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\UseCases\Post\StorePostUseCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->select(['id', 'post', 'status', 'updated_at'])->orderByDesc('updated_at')->paginate(4);

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $users = User::query()->select('name', 'id')->get();
    
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

    public function update(Post $post, UpdateRequest $request)
    {
        $post->name = $request->name;
        $post->email = $request->email;
        $post->save();
        return redirect()->route('post.index');
    }

    public function destroy(int $id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->back();
    }
}
