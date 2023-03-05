<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\UseCases\Post\StorePostUseCase;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->select(['id', 'post', 'status', 'updated_at'])->paginate(10);
        return view('dashboard', compact(['posts' => 'salom']));
    }

    public function store(StorePostUseCase $useCase, StoreRequest $request)
    {
        
        $data = $useCase->execute($request->validated());
        // if (!$data) {
            return redirect()->back()->with('success', "succesfull");
        // }

        // return redirect()->route('review.review.index');
    }
}
