<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allposts = [
            [
                "id" => 1,
                "title" => 'PHP',
                "posted-by" => 'Mohamed',
                "created-at" => '28/1/2023'
            ],
            [
                "id" => 2,
                "title" => 'Laravel',
                "posted-by" => 'Elsayeh',
                "created-at" => '28/1/2023'
            ],
            [
                "id" => 3,
                "title" => 'Node',
                "posted-by" => 'Abd Elzaher',
                "created-at" => '28/1/2023'
            ]
        ];
        return view('posts.index', [
            'posts' => $allposts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        return redirect('/posts');
    }

    public function show($id)
    {
        return view('posts.show');
    }

    public function edit($id)
    {
        return view('posts.edit');
    }

    public function update($id)
    {
        return redirect('/posts');
    }
}
