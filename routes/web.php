<?php

use App\Http\Controllers\Auth\Login as AuthLogin;
use App\Http\Controllers\Auth\Register as AuthRegister;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Profile.public');
});

Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function () {
    // Force Redirect
    Route::get('', function () {
        return redirect(route('Auth_login'));
    });

    // Register
    Route::get('register', [AuthRegister::class, 'form'])->name('Auth_register');
    Route::post('register', [AuthRegister::class, 'process']);

    // Login
    Route::get('login', [AuthLogin::class, 'form'])->name('Auth_login');
    Route::post('login', [AuthLogin::class, 'process']);
});