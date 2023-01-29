@extends('layouts.nav')
@section('title', 'Posts')
@section('csspath')
    <link rel="stylesheet" href="{{asset('css/show.css')}}">
@endsection
@section('page-content')

    <div class="post">
        <div class="post-info">
            <p class="head">Post Info</p>
            <div class="title">
                <span><b>Tiltle:</b></span>
                <span>Laravel</span>
            </div>
            <div class="description">
                <p><b>Description:</b></p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima ad aperiam dolorem excepturi dolorum deserunt alias.</p>
            </div>
        </div>
        <div class="post-creator-info">
            <p class="head">Post Creator Info</p>
            <div class="name">
                <span><b>Name:</b></span>
                <span>Mohamed</span>
            </div>
            <div class="email">
                <span><b>Email:</b></span>
                <span>mo@gmail.com</span>
            </div>
            <div class="creation-date">
                <span><b>Created At:</b></span>
                <span>28/1/2023</span>
            </div>
        </div>
        <a href="/posts" class="back-to-usersdata-btn">Back</a>
    </div>

@endsection
