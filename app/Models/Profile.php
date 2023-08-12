<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded=[];

    public function defaultpic(){
        $imagePath = ($this->image) ? $this->image: "/profile/FSAZJTrpgU2227NrH4e7hGLLg3e9hQxDCU1W9uRR.jpg";
        return '/storage/'. $imagePath ;

    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function followers(){
        return $this->belongstoMany(User::class);
    }



    
}
