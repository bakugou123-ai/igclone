@extends('layouts.app')
@vite(['resources/js/app.js']);
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<div class="container">
<form action="/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    <div class="row">
       
    <h1 class='text-lg bold text-center pb-5'>Edit Profile</h1>
    <div class="row mb-3">
        
        
        <label for="caption" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

        <div class="col-md-6">
            <input id="title" type="caption" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}"  autocomplete="email">

            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        
        
                            <label for="caption" class="col-md-4 col-form-label text-md-end">{{ __('Bio') }}</label>

                            <div class="col-md-6">
                                <input id="bio" type="caption" class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{ old('bio') ?? $user->profile->bio }}"  autocomplete="email">

                                @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="row mb-3">
                            <label for="image"class="col-md-4 col-form-label text-md-end">Edit Profile Picture</label>
                            <input type="file"  id="image" name="image"class="col-md-4 col-form-label text-md-end form-control-file">
                            @error('image')  
                                <strong>{{ $message }}</strong>
                                @enderror         
                        </div>
                        </div>

<div class="row"><button class="btn btn-primary pr-5" style="left: 50px;">Save Changes</button></div>                        
 
                        
</div>
</div>
</div>

    
</form>
   
</div>
@endsection