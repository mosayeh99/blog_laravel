@extends('layouts.nav')
@section('title', 'Add New Post')
@section('csspath')
    <link rel="stylesheet" href="{{asset('css/create.css')}}">
@endsection
@section('page-content')

    <h1>Add New Post</h1>
    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <div class="name">
            <p>Title<span class="required">*</span></p>
            <input type="text" name="title">
        </div>
        <div class="email">
            <p>Description<span class="required">*</span></p>
            <textarea name="description"></textarea>
        </div>
        <div class="crated-at">
            <p>Posted by<span class="required">*</span></p>
            <select name="user_id" >
                @foreach($users as $user)
                <option value="{{$user->id}}" name="user_id">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit">
</form>

@endsection
