<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    public function resetPassword(Request $request)
{
    $validatedData = $request->validate([
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    // Hash dan simpan password baru
    $users = User::all();
    foreach ($users as $user) {
    if (!Hash::needsRehash($user->password)) {
        $user->password = Hash::make('passwordbaru');
        $user->save();
    }
}
    return redirect()->route('dashboard')->with('success', 'Password updated successfully!');
}
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';
}
