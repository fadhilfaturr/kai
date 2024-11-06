<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();

        // Arahkan pengguna ke halaman login setelah logout
        return redirect()->route('auth.login')->with('message', 'You have been logged out.');
    }
}
