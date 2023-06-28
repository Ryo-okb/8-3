<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Task;
use App\Models\Folder;

class AuthController extends Controller
{


    public function showSignupForm()
    {
        return view('auth.registar');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return view('auth.login');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        if (!Auth::attempt($credentials)) {
            Session::flash('error', 'メールアドレスかパスワードが違います。');
            return redirect()->back();
        }
    
        $user = $request->user();
        $folders = $user->folders; // ユーザーに紐づくフォルダを取得
        return view('tasks.index', compact('folders'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('showLoginForm');
    }
    
    
    

}
