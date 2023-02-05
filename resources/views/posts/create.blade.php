@extends('layouts.app')
@section('title', 'Add New Post')
@section('csspath')
    <link rel="stylesheet" href="{{asset('css/create.css')}}">
@endsection
@section('content')

    <h1>Add New Post</h1>
    <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="name">
            <p>Title<span class="required">*</span></p>
            <input type="text" name="title" class="@error('title') is-invalid @enderror">
            @error('title')
            <div class="validate-error-msg">{{ $message }}</div>
            @enderror
        </div>
        <div class="email">
            <p>Description<span class="required">*</span></p>
            <textarea name="description" class="@error('description') is-invalid @enderror"></textarea>
            @error('description')
            <div class="validate-error-msg">{{ $message }}</div>
            @enderror
        </div>
        <div class="crated-at">
            <p>Posted by<span class="required">*</span></p>
            <select name="user_id" >
                @foreach($users as $user)
                <option value="{{$user->id}}" name="user_id">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <p>Tags</p>
            <input type="text" name="tags">
        </div>
        <div>
            <input type="file" name="image" class="@error('image') is-invalid @enderror">
            @error('image')
            <div class="validate-error-msg">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit">
</form>

@endsection
