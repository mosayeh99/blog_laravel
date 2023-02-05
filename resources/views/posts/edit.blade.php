@extends('layouts.app')
@section('title', 'Update Post')
@section('csspath')
    <link rel="stylesheet" href="{{asset('css/create.css')}}">
@endsection
@section('content')

    <h1>Update Post</h1>
    <form action="{{route('posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
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
        <div>
            <p>Tags</p>
            <input type="text" name="tags" value="{{$tags}}">
        </div>
        <div class="d-flex justify-content-center">
            <img src="{{asset('storage/posts_imgs/'.$post->image)}}" alt="Post Image" width="100px">
        </div>
        <div>
            <input type="file" name="image" class="@error('image') is-invalid @enderror">
            @error('image')
            <div class="validate-error-msg">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-end gap-2">
            <a href="/" class="btn btn-outline-secondary d-flex lh-lg">Cancel</a>
            <input type="submit" value="Update" class="update-post-btn">
        </div>
</form>

@endsection
