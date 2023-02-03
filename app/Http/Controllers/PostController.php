<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::paginate(10);
        $deleted_posts = Post::onlyTrashed()->get();
        return view('posts.index', compact('posts', 'deleted_posts'));
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', compact('users'));
    }

    public function store(PostRequest $request)
    {
//        return $request;
        Post::create($request->all());
        return redirect()->route('posts.index');
    }

//    public function store_comment(Request $request)
//    {
//        Comment::create($request->all());
//        return redirect()->back();
//    }

    public function show($id)
    {
        $post = Post::findorfail($id);
//        $comments = Comment::where('post_id',$id)->get();
        return view('posts.show', compact('post',
//            'comments'
        ));
    }

    public function edit($id)
    {
        $post = Post::findorfail($id);
        $users = User::all();
        return view('posts.edit', compact('post','users'));
    }

    public function update(PostRequest $request, $id)
    {
        Post::findorfail($id)->update($request->all());
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
        Post::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('posts.index');
    }

    public function showDeletedPost($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        return view('posts.show', compact('post'));
    }
}
