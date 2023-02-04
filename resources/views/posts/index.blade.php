@extends('layouts.app')
@section('title', 'Posts')
@section('csspath')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection
@section('content')

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
                <span class="flex2">Title Slug</span>
                <span class="flex2">Created At</span>
                <span class="flex3">Action</span>
            </div>
            <div class="content-body">
                <?php $usercounter = 1 ?>
                @foreach ($posts as $post)
                    <?php $usercounter++ ?>
                    @if($usercounter % 2 == 0)
                        <div class="user bg-light">
                    @else
                        <div class="user">
                    @endif
                    <span class="flex1">{{$usercounter - 1}}</span>
                    <span class="flex2">{{$post->title}}</span>
                    <span class="flex2">{{$post->user->name}}</span>
                    <span class="flex2">{{$post->slug}}</span>
                    <span class="flex2">{{$post->created_at->format('Y-m-d')}}</span>
                    <span class="flex3 action-btns">
                        <a href="{{route('posts.show', $post->id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0m13 0c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                            </svg>
                        </a>
                        <a href="{{route('posts.edit', $post->id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1m3.385 -10.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415zm-4.385 -1.585l3 3"></path>
                            </svg>
                        </a>
                        <a onclick="showPostModel('{{route('posts.show.model',$post->id)}}')" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-in-area" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                               <path d="M15 13v4"></path>
                               <path d="M13 15h4"></path>
                               <path d="M15 15m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0"></path>
                               <path d="M22 22l-3 -3"></path>
                               <path d="M6 18h-1a2 2 0 0 1 -2 -2v-1"></path>
                               <path d="M3 11v-1"></path>
                               <path d="M3 6v-1a2 2 0 0 1 2 -2h1"></path>
                               <path d="M10 3h1"></path>
                               <path d="M15 3h1a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </a>
                        <form action="{{route('posts.destroy', $post->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                        <button type="submit" class="soft-delete-btn" onclick="return confirm('You are about to make soft delete to this post.\nAre you sure want this?')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                               <path d="M18 6l-12 12"></path>
                               <path d="M6 6l12 12"></path>
                            </svg>
                        </button>
                        </form>
                    </span>
                </div>
                @endforeach


                @foreach($deleted_posts as $deleted_post)
                    <?php $usercounter++ ?>
                    @if($usercounter % 2 == 0)
                        <div class="user bg-deleted1">
                            @else
                                <div class="user bg-deleted2">
                            @endif
                                <span class="flex1">{{$usercounter - 1}}</span>
                                <span class="flex2">{{$deleted_post->title}}</span>
                                <span class="flex2">{{$deleted_post->user->name}}</span>
                                <span class="flex2">{{$deleted_post->slug}}</span>
                                <span class="flex2">{{\Carbon\Carbon::parse($deleted_post->created_at)->format('Y-m-d')}}</span>
                                <span class="flex3 action-btns">
                        <a href="{{route('posts.show.deleted', $deleted_post->id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0m13 0c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                            </svg>
                        </a>
                        <a href="{{route('posts.force.delete', $deleted_post->id)}}" onclick="return confirm('You are about to delete this post forever.\nAre you sure want this?')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                               <path d="M4 7l16 0"></path>
                               <path d="M10 11l0 6"></path>
                               <path d="M14 11l0 6"></path>
                               <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                               <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                            </svg>
                        </a>
                        <a onclick="showPostModel('{{route('deleted.posts.show.model',$deleted_post->id)}}')" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-in-area" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                               <path d="M15 13v4"></path>
                               <path d="M13 15h4"></path>
                               <path d="M15 15m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0"></path>
                               <path d="M22 22l-3 -3"></path>
                               <path d="M6 18h-1a2 2 0 0 1 -2 -2v-1"></path>
                               <path d="M3 11v-1"></path>
                               <path d="M3 6v-1a2 2 0 0 1 2 -2h1"></path>
                               <path d="M10 3h1"></path>
                               <path d="M15 3h1a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </a>
                        <a href="{{route('posts.restore', $deleted_post->id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-reload" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                               <path d="M19.933 13.041a8 8 0 1 1 -9.925 -8.788c3.899 -1 7.935 1.007 9.425 4.747"></path>
                               <path d="M20 4v5h-5"></path>
                            </svg>
                        </a>
                    </span>
                </div>
                @endforeach
            </div>
        </div>
        {{ $posts->links() }}
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Post Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="bg-opacity-25 bg-secondary p-2">Post Info</h6>
                    <p class="mb-0 ps-2"><b>Title: </b><span id="model-post-title"></span></p>
                    <p class="mb-0 ps-2"><b>Description: </b></p>
                    <p class="ps-2" id="model-post-description"></p>
                    <hr>
                    <h6 class="bg-opacity-25 bg-secondary p-2">Post Creator Info</h6>
                    <p class="mb-0 ps-2"><b>Name: </b><span id="model-user-name"></span></p>
                    <p class="ps-2"><b>Email: </b><span id="model-user-email"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        // function showPostModel(url) {
        //     let request = new XMLHttpRequest();
        //     request.open('GET',url,true);
        //     request.send();
        //     request.onreadystatechange = function () {
        //         if (this.readyState == 4 && this.status == 200) {
        //             let data = JSON.parse(this.responseText);
        //             document.querySelector('#model-post-title').textContent = data['post'].title;
        //             document.querySelector('#model-post-description').textContent = data['post'].description;
        //             document.querySelector('#model-user-name').textContent = data['user'].name;
        //             document.querySelector('#model-user-email').textContent = data['user'].email;
        //         }
        //     }
        // }
        function showPostModel(url) {
            fetch(url)
            .then(res => res.json())
            .then(data => {
                document.querySelector('#model-post-title').textContent = data['post'].title;
                document.querySelector('#model-post-description').textContent = data['post'].description;
                document.querySelector('#model-user-name').textContent = data['user'].name;
                document.querySelector('#model-user-email').textContent = data['user'].email;
            })
        }
    </script>
@endsection
