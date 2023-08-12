@extends('layouts.app')
@vite(['resources/js/app.js']);
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<div class="container">
    <div class="row">
        <div class="col-3 pt-4 " >

            <img src="{{$user->profile->defaultpic()}}" class="rounded-circle" style="max-height:160px; width:150px;">
        </div>
        <div class="col-9 pt-5">
        <div class="d-flex justify-content-between align-items-baseline"><div class="d-flex align-items-center pb-3"><div class="h4">{{$user->username}}</div><follow-button user-id="{{$user->id}}" follows="{{ $follows }}"></follow-button></div>
        
        @can('update', $user->profile)
        <a  href="/p/create">Add New Post</a>
        @endcan
        </div>
       @can ('update', $user->profile)
       <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
       @endcan
        <div class="d-flex">
        <div style="padding-right:25px" ><strong>{{$user->posts->count()}}</strong> posts</div>
        <div style="padding-right:25px"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
        <div style="padding-right:25px"><strong>{{$user->following->count()}}</strong> following</div>
</div>
<div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
<div>{{$user->profile->bio}}</div>
    </div>
</div>

<div class="row pt-5">
    @foreach($user->posts as $post)
    <div class="col-4 pb-4">
    <a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}" class="w-100"></a>
    </div>
    @endforeach
</div>
</div>
@endsection
