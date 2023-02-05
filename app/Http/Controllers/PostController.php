<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Jobs\PruneOldPostsJop;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class PostController extends Controller
{
    public function index()
    {
//        PruneOldPostsJop::dispatch();
        $posts = Post::paginate(10);
        $deleted_posts = Post::onlyTrashed()->get();
        return view('posts.index', compact('posts', 'deleted_posts'));
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', compact('users'));
    }

    public function store(StorePostRequest $request)
    {
        $image_name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('posts_imgs',$image_name,'postImgs');
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'image' => $image_name
        ]);
        if ($request->tags !== null){
            $tags = explode(',', $request->tags);
            $post->attachTags($tags);
        }
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::findorfail($id);
        $tags = $post->tags->pluck('name');
        return view('posts.show', compact('post','tags'));
    }

    public function edit($id)
    {
        $post = Post::findorfail($id);
        $tags = $post->tags->pluck('name');
        $tags = implode(',',$tags->toArray());
        $users = User::all();
        return view('posts.edit', compact('post','users','tags'));
    }

    public function update(StorePostRequest $request, $id)
    {
        $image_name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('posts_imgs',$image_name,'postImgs');
        $post = Post::findorfail($id);
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'image' => $image_name
        ]);
        if ($request->tags !== null) {
            $tags = explode(',', $request->tags);
            $post->attachTags($tags);
        }
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('posts.index');
    }

    public function restore($id)
    {
        Post::withTrashed()->where('id', $id)->restore();
        return redirect()->route('posts.index');
    }

    public function forceDelete($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        Storage::disk('postImgs')->delete('posts_imgs/'.$post->image);
        $post->forceDelete();
        return redirect()->route('posts.index');
    }

    public function showDeletedPost($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        return view('posts.show', compact('post'));
    }
}
