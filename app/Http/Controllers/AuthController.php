<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function register(){
        return view('auth.register');
    }

    
    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('products');
        }

        return back()->withErrors([
            'email' => "The provided credentiales do not match our records",
        ]); 
    }

    public function register_store(Request $request ){
        // dd($request);
        $validated= $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:4',
            
        ]);
        $validated['password']=Hash::make($validated['password']);
    
        $user = User::create($validated);
        auth()->login($user);
        return redirect('/')->with('success',"Accaunt successfully registered ");
    }
}
