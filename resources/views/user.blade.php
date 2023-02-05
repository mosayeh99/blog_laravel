@extends('layouts.app')

@section('content')
    <form action="{{route('users.update',$user->id)}}" method="post" style="width: 500px; margin: auto;">
        @method('PUT')
        @csrf
        <p class="fs-1 mb-5 mt-3 text-center">Welcome {{$user->name}}</p>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Email</label>
            <input type="email" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput2">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleFormControlInput3">
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" value="Save" class="btn btn-primary">
    </form>
@endsection
