<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function Register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'roleId' => 'integer',
            'address' => 'string|nullable',
            'contact' => 'string|nullable',
            'deskripsi'=> 'string|nullable',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->roleId = $request->roleId ? $request->roleId : 2;
        $user->address = $request->address;
        $user->contact = $request->contact;
        $user->deskripsi = $request->deskripsi;
        $user->save();


        return response()->json([
            'message' => 'User created successfully',
        ], 201);
    }

    public function loginView(){
        return view('login');
    }

    public function registerView(){
        return view('register');
    }

    public function homeView(){
        return view('home');
    }


    public function login(Request $request){
       $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(!auth()->attempt($credential)){
            return response()->json([
                'message' => 'Invalid email or password',
            ], 401);
        }

        $request->session()->regenerate();

        return redirect()->route('home');
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
