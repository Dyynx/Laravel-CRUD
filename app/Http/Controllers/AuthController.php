<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLogin()
    {
        return view('admin.login');
    }

    /**
     * Process login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($credentials['username'] === config('app.admin_username') && 
            $credentials['password'] === config('app.admin_password')) {
            session(['admin' => true]);
            return redirect('/admin/dashboard')->with('success', 'Login berhasil');
        }

        return back()->with('error', 'Username atau password salah');
    }

    /**
     * Logout
     */
    public function logout()
    {
        session()->forget('admin');
        return redirect('/')->with('success', 'Logout berhasil');
    }
}
