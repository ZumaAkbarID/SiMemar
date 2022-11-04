<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\SiMemarConfig;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Settings extends Controller
{
    public function __construct()
    {
        $this->SiMemarConfig = SiMemarConfig::first();
    }

    public function form()
    {
        return view('Account.settings', [
            'SiMemarConfig' => $this->SiMemarConfig,
            'title' => 'Pengaturan Akun | ' . $this->SiMemarConfig->app_name,
            'pengurusUser' => (Auth::user()->account_verified_by == 0) ? ['name' => 'System', 'role' => 'System'] : User::find(Auth::user()->account_verified_by)
        ]);
    }

    public function process(Request $request)
    {
        if ($request->type == 'text') {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'email' => 'required|email:dns,rfc|unique:users,email,' . Auth::user()->id,
                    'phone_number' => 'required|numeric|min:8|unique:users,phone_number' . Auth::user()->id,
                    'address' => 'required|min:8',
                ],
                [
                    'name.required' => 'Nama dibutuhkan',
                    'email.required' => 'Email dibutuhkan',
                    'phone_number.required' => 'Nomor HP dibutuhkan',
                    'address.required' => 'Alamat dibutuhkan',
                    'email.email' => 'Email tidak valid',
                    'email.unique' => 'Email sudah digunakan',
                    'phone_number.unique' => 'Nomor HP sudah digunakan',
                    'phone_number.numeric' => 'Nomor HP hanya boleh angka',
                    'phone_number.min' => 'Nomor HP tidak valid',
                    'address.min' => 'Alamat minimal 8 karakter',
                ]
            );

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number
            ];

            if (!is_null($request->position)) {
                $data['position'] = $request->position;
            }
            if (!is_null($request->skill)) {
                $data['skill'] = $request->skill;
            }

            if (User::find(Auth::user()->id)->update($data)) {
                return redirect()->back()->with('success', 'Berhasil memperbarui akun');
            } else {
                return redirect()->back()->with('error', 'Gagal memperbarui akun');
            }
        } else if ($request->type == 'image') {
            $this->validate(
                $request,
                [
                    'profile_img' => 'required|image|mimes:png|max:2048'
                ],
                [
                    'profile_img.required' => 'Foto profil dibutuhkan',
                    'profile_img.image' => 'Foto profil harus merupakan gambar',
                    'profile_img.mimes' => 'Foto profil hanya boleh ber-ekstensi png',
                    'profile_img.max' => 'Foto profil maksimal 2MB',
                ]
            );

            $data = [
                'profile_img' => $request->file('profile_img')->storeAs('profile/image', Str::slug(Auth::user()->name) . '-' . time() . '.png')
            ];

            if (Storage::exists($data['profile_img'])) {
                Storage::delete(Auth::user()->profile_img);
            }

            if (User::find(Auth::user()->id)->update($data)) {
                return redirect()->back()->with('success', 'Berhasil memperbarui foto profil akun');
            } else {
                return redirect()->back()->with('error', 'Gagal memperbarui foto profil akun');
            }
        } else if ($request->type == 'password') {
            $this->validate(
                $request,
                [
                    'current_password' => 'required',
                    'password' => 'required|min:8|confirmed',
                ],
                [
                    'current_password.required' => 'Password saat ini dibutuhkan',
                    'password.required' => 'Password saat ini dibutuhkan',
                    'password.min' => 'Password minimal 8 karakter',
                    'password.confirmed' => 'Password tidak sama',
                ]
            );

            if (Hash::check($request->password, Auth::user()->password)) {
                return redirect()->back()->with('error', 'Password saat ini tidak sesuai');
            }

            if (User::find(Auth::user()->id)->update(['password' => Hash::make($request->password)])) {
                return redirect()->back()->with('success', 'Berhasil memperbarui password akun');
            } else {
                return redirect()->back()->with('error', 'Gagal memperbarui password akun');
            }
        }
    }
}