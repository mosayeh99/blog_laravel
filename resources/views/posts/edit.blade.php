@extends('layouts.nav')
@section('title', 'Posts')
@section('csspath')
    <link rel="stylesheet" href="{{asset('css/create.css')}}">
@endsection
@section('page-content')

    <h1>Update Post</h1>
    <form method="put" action="/posts/">
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
            <p>Crated At<span class="required">*</span></p>
            <input type="text" name="crated-at">
        </div>
        <div class="form-btns">
            <a href="/posts/1" class="update-post-btn">Update</a>
        </div>
</form>

@endsection
