<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LaraJobs;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => ['required','string', 'min:5'],
            'email'=> ['required', 'email' ,Rule::unique('users')],
            'password' => ['required', 'confirmed' ,'min:4']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password


        ]);

        return redirect('/login')->with('success', 'Log in here');



    }

    public function logged(Request $request){
        $request->validate([
            'email'=> ['required'],
            'password' => ['required']
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return view('index', ['larajobs' => LaraJobs::all()]);

        }
        else{
            return back()->with('error', "Invalid Email or Password");
        }


    }
}
