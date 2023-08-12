<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;
use App\Models\User;
class ProfilesController extends Controller
{
    public function index(User $user){
        $follows =(auth()->user()) ? auth()->user()->following->contains($user->id):false;
    
        return view('profiles.index',compact('user','follows'));
    }

    public function edit(\App\Models\User $user){

        $this-> authorize('update', $user->profile);

        return view('profiles.edit',compact('user'));
    }

    public function update(\App\Models\User $user){

        
        $this-> authorize('update', $user->profile);


        $data = request()->validate([
            'title'=> 'required',
            'bio'=>'required',
            'image'=>'',

        ]);
        if (request('image')){
            $imagePath = request('image')->store('profile','public');
            $image= Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
            $image->save();
    
        }

        auth()->user()->profile->update(array_merge($data,
        [
            'image'=>$imagePath
        ]));
        return redirect("/profile/{$user->id}");
    }
}
