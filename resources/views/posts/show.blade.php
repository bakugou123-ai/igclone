@extends('layouts.app')
@vite(['resources/js/app.js']);
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->defaultpic() }}" class="rounded-circle w-100" style="max-width: 40px;">
                    </div>
                    <div>
                        <div class="">
                            <a style="color:black;" href="/profile/{{ $post->user->id }}">
                                <span>{{ $post->user->username }}</span>
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="#"  class=" btn btn-primary btn-sm pl-3">Follow</a>
                        </div>
                    </div>
                </div>

                <hr>

                <p>
                    <span class="">
                        <a style="color:black" href="/profile/{{ $post->user->id }}">
                            <span style="color:black;">{{ $post->user->username }}</span>
                        </a>&nbsp;
                    </span> {{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection