<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function uploadAvatar(Request $request){
        // check if has image
        if($request->hasFile('image')){
            User::uploadAvatar($request->image);
        }
        return redirect()->back()->with('message', 'Avatar has been uploaded');
   
    }

    public function index(){
        $data = [
            'name' => 'julia suazo',
            'email' => 'wendellchansassuazasdso11wss11@gmail.com',
            'password' => 'test password',
        ];
        $user = User::create($data);        
        return view('users');
    }
    
   
}
