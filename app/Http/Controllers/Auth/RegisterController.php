<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    public function register(Request $request)
{
    $validatedData = $request->validate([
        'username' => 'required|string|max:255',
        'password' => 'required|string|min:8',
    ]);

    // Hash password sebelum menyimpannya di database
    User::create([
        'username' => $validatedData['username'],
        'password' => Hash::make($validatedData['password']), // Gunakan Hash::make
    ]);

    return redirect()->route('login');
}

    protected function create(array $data)
{
    return User::create([
        'username' => $data['username'],
        'password' => Hash::make($data['password']), // Gunakan Hash::make() untuk hashing password
    ]);
}

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    
}
