<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function dashboardlogin(Request $request){
        return 'Berhasil untuk Login ke Dashboard';
    }
    public function register(){
        return view('auth.register');
    }
}
