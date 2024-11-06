<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register'); // Pastikan file view register.blade.php ada di resources/views/auth/
    }

    /**
     * Display the registration view
     */
    public function create()
    {
        return view('auth.register'); // Pastikan view auth.register ada
    }

    /**
     * Handle on incoming regitration request
     * 
     * @throws \Illuminate\Validatetion\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // Arahkan ke halaman login setelah pendaftaran
        return redirect()->route('auth.login')->with('success', 'Registration successful! Please login.');

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
} 
