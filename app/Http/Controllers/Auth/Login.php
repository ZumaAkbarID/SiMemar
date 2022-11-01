<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SiMemarConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function __construct()
    {
        $this->SiMemarConfig = SiMemarConfig::first();
    }

    public function form()
    {
        return view('Auth.login', [
            'title' => 'Masuk | ' . $this->SiMemarConfig->app_name,
            'SiMemarConfig' => $this->SiMemarConfig
        ]);
    }

    public function process(Request $request)
    {
        $this->validate(
            $request,
            [
                'auth' => 'required',
                'password' => 'required',
            ],
            [
                'auth.required' => 'Email atau Nomor HP dibutuhkan',
                'password.required' => 'Password dibutuhkan',
            ]
        );

        if (filter_var($request->auth, FILTER_VALIDATE_EMAIL)) {
            if (Auth::attempt(['email' => $request->auth, 'password' => $request->password, 'status' => 'Aktif'])) {
                return redirect()->intended(route('Dashboard_index'));
            } else {
                return redirect()->back()->withInput()->with('error', 'Akun tidak ditemukan');
            }
        } else {
            if (Auth::attempt(['phone_number' => $request->auth, 'password' => $request->password, 'status' => 'Aktif'])) {
                return redirect()->intended(route('Dashboard_index'));
            } else {
                return redirect()->back()->withInput()->with('error', 'Akun tidak ditemukan');
            }
        }
    }
}