<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

      public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return $this->authenticated($request, Auth::user());
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
}

        // Redirect users based on their roles after login
    protected function authenticated($request, $user)
{
    if (in_array($user->role, ['admin', 'employee'])) {
        return redirect()->route('admin.categories.index'); 
    }

    return redirect()->route('home');
}

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'user',
    ]);

    auth()->login($user);

    return redirect()->route('home'); // Redirect to a home page after registration  
}



   public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }



    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
