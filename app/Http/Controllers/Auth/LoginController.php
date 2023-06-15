<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended($this->redirectTo());
        } else {
            return redirect()->back()->withErrors(['login' => 'Invalid login credentials.']);
        }
    }

    private function redirectTo()
    {
        $user = Auth::user();

        if ($user->role === 'employee') {
            return route('employee.home');
        } else {
            return route('admin.home');
        }
    }
}
