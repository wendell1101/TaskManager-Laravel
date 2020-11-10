<?php

namespace App;

use App\Todo;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // protected function setPasswordAttribute($password){
    //     $this->attributes['password'] = bcrypt($password);
    // }

    // protected function getNameAttribute($name){
    //     return $this->attributes['name'] = explode(' ',$name)[0];
    // }

    public function getFirstName(){
        return $this->name = explode(' ', $this->name)[0];         
    }

    public static function uploadAvatar($image){
        $filename = $image->getClientOriginalName();
        (new self())->deleteOldImage();
        
        $path = $image->storeAs('images', $filename , 'public');
        auth()->user()->update(['avatar'=>$filename]);
    }

    protected function deleteOldImage(){
        if(auth()->user()->avatar){
            Storage::delete('/public/images/' .auth()->user()->avatar);
        }
    }

    public function todos(){
        return $this->hasMany('App\Todo');
    }
}
