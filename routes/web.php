<?php

use App\Models\Hardware;
use App\Models\Jaringan;
use App\Models\Software;
use App\Models\HardwareL;
use App\Models\HardwareM;
use App\Models\HardwareT;
use App\Models\JaringanL;
use App\Models\JaringanM;
use App\Models\JaringanT;
use App\Models\Locotrack;
use App\Models\SoftwareL;
use App\Models\SoftwareM;
use App\Models\LocotrackL;
use App\Models\LocotrackM;
use App\Models\LocotrackT;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HardLController;
use App\Http\Controllers\HardMController;
use App\Http\Controllers\HardTController;
use App\Http\Controllers\LocoLController;
use App\Http\Controllers\LocoMController;
use App\Http\Controllers\LocoTController;
use App\Http\Controllers\SoftLController;
use App\Http\Controllers\SoftMController;
use App\Http\Controllers\SoftTController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JaringanLController;
use App\Http\Controllers\JaringanMController;
use App\Http\Controllers\JaringanTController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\TroubleshootController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('auth.register');

    Route::post('/register', [RegisterController::class, 'create'])->name('register');

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::middleware('guest')->group(function () {
        Route::get('/register', [RegisteredUserController::class, 'showRegistrationForm'])->name('auth.register');
        Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->middleware('auth')->name('reset-password');


});



});

Route::match(['get', 'post'], '/login', [LoginController::class, 'index'])->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
});

Route::middleware(['auth'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::post('/dashboard', [DashboardController::class, 'store']);
Route::match(['get', 'post'], '/dashboard', [DashboardController::class, 'index']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'dashboardlogin']);

Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
->middleware(['auth', 'verified'])
->name('dashboard.index');

Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('reset-password');


//TAMPILAN 
route::resource('/maintenance', MaintenanceController::class);
Route::get('/hardwarem', [HardMController::class, 'index'])->name('hardwarem.index');
Route::post('/hardwarem', [HardMController::class, 'store'])->name('hardwarem.store');
Route::get('/hardwarem/{id}/edit', [HardMController::class, 'edit'])->name('hardwarem.edit');
Route::put('/hardwarem/{id}', [HardMController::class, 'update'])->name('hardwarem.update');
Route::delete('/hardwarem/{id}', [HardMController::class, 'destroy'])->name('hardwarem.destroy');

Route::get('/softwarem', [SoftMController::class, 'index'])->name('softwarem.index');
Route::post('/softwarem', [SoftMController::class, 'store'])->name('softwarem.store');
Route::get('/softwarem/{id}/edit', [SoftMController::class, 'edit'])->name('softwarem.edit');
Route::put('/softwarem/{id}', [SoftMController::class, 'update'])->name('softwarem.update');
Route::delete('/softwarem/{id}', [SoftMController::class, 'destroy'])->name('softwarem.destroy');

Route::get('/locotrackm', [LocoMController::class, 'index'])->name('locotrackm.index');
Route::post('/locotrackm', [LocoMController::class, 'store'])->name('locotrackm.store');
Route::get('/locotrackm/{id}/edit', [LocoMController::class, 'edit'])->name('locotrackm.edit');
Route::put('/locotrackm/{id}', [LocoMController::class, 'update'])->name('locotrackm.update');
Route::delete('/locotrackm/{id}', [LocoMController::class, 'destroy'])->name('locotrackm.destroy');

Route::get('/jaringanm', [JaringanMController::class, 'index'])->name('jaringanm.index');
Route::post('/jaringanm', [JaringanMController::class, 'store'])->name('jaringanm.store');
Route::get('/jaringanm/{id}/edit', [JaringanMController::class, 'edit'])->name('jaringanm.edit');
Route::put('/jaringanm/{id}', [JaringanMController::class, 'update'])->name('jaringanm.update');
Route::delete('/jaringanm/{id}', [JaringanMController::class, 'destroy'])->name('jaringanm.destroy');

route::resource('/layanan',LayananController::class);
Route::get('/hardwarel', [HardLController::class, 'index'])->name('hardwarel.index');
Route::post('/hardwarel', [HardLController::class, 'store'])->name('hardwarel.store');
Route::get('/hardwarel/{id}/edit', [HardLController::class, 'edit'])->name('hardwarel.edit');
Route::put('/hardwarel/{id}', [HardLController::class, 'update'])->name('hardwarel.update');
Route::delete('/hardwarel/{id}', [HardLController::class, 'destroy'])->name('hardwarel.destroy');

Route::get('/softwarel', [SoftLController::class, 'index'])->name('softwarel.index');
Route::post('/softwarel', [SoftLController::class, 'store'])->name('softwarel.store');
Route::get('/softwarel/{id}/edit', [SoftLController::class, 'edit'])->name('softwarel.edit');
Route::put('/softwarel/{id}', [SoftLController::class, 'update'])->name('softwarel.update');
Route::delete('/softwarel/{id}', [SoftLController::class, 'destroy'])->name('softwarel.destroy');

Route::get('/locotrackl', [LocoLController::class, 'index'])->name('locotrackl.index');
Route::post('/locotrackl', [LocoLController::class, 'store'])->name('locotrackl.store');
Route::get('/locotrackl/{id}/edit', [LocoLController::class, 'edit'])->name('locotrackl.edit');
Route::put('/locotrackl/{id}', [LocoLController::class, 'update'])->name('locotrackl.update');
Route::delete('/locotrackl/{id}', [LocoLController::class, 'destroy'])->name('locotrackl.destroy');

Route::get('/jaringanl', [JaringanLController::class, 'index'])->name('jaringanl.index');
Route::post('/jaringanl', [JaringanLController::class, 'store'])->name('jaringanl.store');
Route::get('/jaringanl/{id}/edit', [JaringanLController::class, 'edit'])->name('jaringanl.edit');
Route::put('/jaringanl/{id}', [JaringanLController::class, 'update'])->name('jaringanl.update');
Route::delete('/jaringanl/{id}', [JaringanLController::class, 'destroy'])->name('jaringanl.destroy');

route::resource('/troubleshoot',TroubleshootController::class);
Route::get('/hardwaret', [HardTController::class, 'index'])->name('hardwaret.index');
Route::post('/hardwaret', [HardTController::class, 'store'])->name('hardwaret.store');
Route::get('/hardwaret/{id}/edit', [HardTController::class, 'edit'])->name('hardwaret.edit');
Route::put('/hardwaret/{id}', [HardTController::class, 'update'])->name('hardwaret.update');
Route::delete('/hardwaret/{id}', [HardTController::class, 'destroy'])->name('hardwaret.destroy');

Route::get('/softwaret', [SoftTController::class, 'index'])->name('softwaret.index');
Route::post('/softwaret', [SoftTController::class, 'store'])->name('softwaret.store');
Route::get('/softwaret/{id}/edit', [SoftTController::class, 'edit'])->name('softwaret.edit');
Route::put('/softwaret/{id}', [SoftTController::class, 'update'])->name('softwaret.update');
Route::delete('/softwaret/{id}', [SoftTController::class, 'destroy'])->name('softwaret.destroy');

Route::get('/locotrackt', [LocoTController::class, 'index'])->name('locotrackt.index');
Route::post('/locotrackt', [LocoTController::class, 'store'])->name('locotrackt.store');
Route::get('/locotrackt/{id}/edit', [LocoTController::class, 'edit'])->name('locotrackt.edit');
Route::put('/locotrackt/{id}', [LocoTController::class, 'update'])->name('locotrackt.update');
Route::delete('/locotrackt/{id}', [LocoTController::class, 'destroy'])->name('locotrackt.destroy');

Route::get('/jaringant', [JaringanTController::class, 'index'])->name('jaringant.index');
Route::post('/jaringant', [JaringanTController::class, 'store'])->name('jaringant.store');
Route::get('/jaringant/{id}/edit', [JaringanTController::class, 'edit'])->name('jaringant.edit');
Route::put('/jaringant/{id}', [JaringanTController::class, 'update'])->name('jaringant.update');
Route::delete('/jaringant/{id}', [JaringanTController::class, 'destroy'])->name('jaringant.destroy');

route::resource('/contact', ContactController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
