<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/nav.css">
    @section('csspath')

    @show
</head>
<body>
    <header>
        <a href="{{route('posts.index')}}">CRUD</a>
        <a href="{{route('posts.index')}}">All Posts</a>
    </header>
    @yield('page-content')
</body>
</html>
