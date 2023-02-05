<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->paginate(5);
        return PostResource::collection($posts);
    }

    public function show($id)
    {
        $post = Post::findorfail($id);
        return new PostResource($post);
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->all());
        return new PostResource($post);
    }
}
