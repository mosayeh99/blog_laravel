@extends('layouts.nav')
@section('title', 'Preview Post')
@section('csspath')
    <link rel="stylesheet" href="{{asset('css/show.css')}}">
    <livewire:styles />
@endsection
@section('page-content')

    <div class="post">
        <div class="post-info">
            <p class="head">Post Info</p>
            <div class="title">
                <span><b>Tiltle: </b></span>
                <span>{{$post->title}}</span>
            </div>
            <div class="description">
                <p><b>Description:</b></p>
                <p>{{$post->description}}</p>
            </div>
        </div>
        <div class="post-creator-info">
            <p class="head">Post Creator Info</p>
            <div class="name">
                <span><b>Name: </b></span>
                <span>{{$post->user->name}}</span>
            </div>
            <div class="email">
                <span><b>Email: </b></span>
                <span>{{$post->user->email}}</span>
            </div>
            <div class="creation-date">
                <span><b>Created At: </b></span>
                <span>{{$post->user->created_at}}</span>
            </div>
        </div>
        <livewire:show-comments/>
{{--        <div class="post-comments">--}}
{{--            <p class="head">Comments</p>--}}
{{--            @foreach($comments as $comment)--}}
{{--            <div class="comment">--}}
{{--                <span class="comment-avatar">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">--}}
{{--                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>--}}
{{--                       <path d="M12 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>--}}
{{--                       <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>--}}
{{--                    </svg>--}}
{{--                </span>--}}
{{--                <div class="comment-body">--}}
{{--                    <p>{{$comment->comment_body}}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
            <livewire:create-comment />
{{--        <form action="{{route('posts.store.comment')}}" method="post" class="add-comments">--}}
{{--            @csrf--}}
{{--            <input type="text" name="post_id" value="{{$post->id}}" hidden>--}}
{{--            <textarea name="comment_body" placeholder="Type Comment..."></textarea>--}}
{{--            <input type="submit" value="Add Comment">--}}
{{--        </form>--}}
    </div>
    <livewire:scripts />
@endsection
