<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(){

        return view('auth.register');
    }

    public function doregister(Request $request ){
        // print_r($request);
        // die();
        $request->validate([
            'name' =>['required', 'string','min:3','max:30'],
            'email' =>['required'],
            'password' =>['required','string']
        ]);

        User::create([
            'name' => $request->get('name'),
            'email'=>$request->get('email'),
            'password' =>Hash::make( $request->get('password')),
        ]);
        
         return redirect()->route('login');

    }


  

}
