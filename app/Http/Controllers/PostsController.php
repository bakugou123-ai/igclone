<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller

{
    public function __construct(){
        $this-> middleware('auth');
    }

    public function index(User $user){
        $user1= auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post:: whereIn('user_id', $user1)->orderBy('created_at','DESC')->get();
        return view('posts.index',compact('posts','user'));
    }
    public function create(){
    return view('posts.create');
    }

    public function store(){

        $data = request()->validate([
            'another'=>'',
            'caption' => 'required',
            'image' =>['required','image'],
        ]);
         $imagePath = request('image')->store('uploads','public');
        $image= Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();
    

            auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'image'=>$imagePath,
        ]);
        
        return redirect('/profile/'.auth()->user()->id);


    }

    public function show(\App\Models\Post $post){
        return view('posts.show', compact('post'));
    }



  

}
