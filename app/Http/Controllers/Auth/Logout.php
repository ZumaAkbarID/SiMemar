<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        Session::flush();
        return redirect(route('Auth_login'))->with('success', 'Berhasil keluar');
    }
}