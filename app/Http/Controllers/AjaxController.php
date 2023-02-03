<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function show($id)
    {
        $post = Post::findorfail($id);
        $user = Post::findorfail($id)->user;
        $deleted_post = Post::withTrashed()->where('id',$id)->get();
        return response()->json(['post'=>$post,'user'=>$user,'deleted_post'=>$deleted_post]);
    }

    public function show_deleted($id)
    {
        $user = Post::withTrashed()->findorfail($id)->user;
        $post = Post::withTrashed()->findorfail($id);
        return response()->json(['post'=>$post,'user'=>$user]);
    }
}
