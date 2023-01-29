@extends('layouts.nav')
@section('title', 'Posts')
@section('csspath')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection
@section('page-content')

    <div class="users-details">
        <div class="head">
            <p>Posts Details</p>
            <a href="{{route('posts.create')}}">Add New Post</a>
        </div>
        <div class="content">
            <div class="content-head">
                <span class="flex1">#</span>
                <span class="flex2">Title</span>
                <span class="flex2">Posted By</span>
                <span class="flex2">Created At</span>
                <span class="flex3">Action</span>
            </div>
            <div class="content-body">
                <?php $usercounter = 0 ?>
                @foreach ($posts as $post)
                    <?php $usercounter++ ?>
                    @if($usercounter % 2 == 0)
                        <div class="user bg-light">
                    @else
                        <div class="user">
                    @endif
                    <span class="flex1">{{$usercounter}}</span>
                    <span class="flex2">{{$post['title']}}</span>
                    <span class="flex2">{{$post['posted-by']}}</span>
                    <span class="flex2">{{$post['created-at']}}</span>
                    <span class="flex3 action-btns">
                        <a href="{{route('posts.show', $post['id'])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0m13 0c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                            </svg>
                        </a>
                        <a href="{{route('posts.edit', $post['id'])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1m3.385 -10.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415zm-4.385 -1.585l3 3"></path>
                            </svg>
                        </a>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 7l16 0m-10 4l0 6m4 -6l0 6m-9 -10l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12m-10 0v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                            </svg>
                        </a>
                    </span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
