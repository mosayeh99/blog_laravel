@extends('layouts.app')
@section('title', 'Update Post')
@section('csspath')
    <link rel="stylesheet" href="{{asset('css/create.css')}}">
@endsection
@section('content')

    <h1>Update Post</h1>
    <form action="{{route('posts.update', $post->id)}}" method="post">
        @method('PUT')
        @csrf
        <div class="name">
            <p>Title<span class="required">*</span></p>
            <input type="text" name="title" value="{{$post->title}}" class="@error('title') is-invalid @enderror">
            @error('title')
            <div class="validate-error-msg">{{ $message }}</div>
            @enderror
        </div>
        <div class="email">
            <p>Description<span class="required">*</span></p>
            <textarea name="description" class="@error('description') is-invalid @enderror">{{$post->description}}</textarea>
            @error('description')
            <div class="validate-error-msg">{{ $message }}</div>
            @enderror
        </div>
        <div class="crated-at">
            <p>Posted by<span class="required">*</span></p>
            <select name="user_id">
                @foreach($users as $user)
                    @if($user->id === $post->user_id)
                        <option value="{{$user->id}}" name="user_id" selected>{{$user->name}}</option>
                    @else
                        <option value="{{$user->id}}" name="user_id">{{$user->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <input type="submit" value="Update" class="update-post-btn">
</form>

@endsection
