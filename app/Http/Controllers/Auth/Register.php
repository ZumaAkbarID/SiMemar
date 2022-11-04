<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SiMemarConfig;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Register extends Controller
{
    public function __construct()
    {
        $this->SiMemar = SiMemarConfig::first();
    }

    public function form()
    {
        return view('Auth.register', [
            'title' => 'Daftar | ' . $this->SiMemar->app_name,
            'SiMemarConfig' => $this->SiMemar,
        ]);
    }

    public function process(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|unique:users,email|email:dns,rfc',
                'phone_number' => 'required|unique:users,phone_number|numeric|min:8',
                'address' => 'required|min:8',
                'password' => 'required|confirmed|min:8',
                'profile_img' => 'required|image|mimes:png|max:1024|dimensions:ratio=1/1'
            ],
            [
                'name.required' => 'Nama dibutuhkan',
                'email.required' => 'Email dibutuhkan',
                'email.unique' => 'Email telah digunakan',
                'email.email' => 'Email tidak valid',
                'phone_number.required' => 'Nomor HP dibutuhkan',
                'phone_number.unique' => 'Nomor HP telah digunakan',
                'phone_number.numeric' => 'Nomor HP tidak valid',
                'phone_number.min' => 'Nomor HP tidak valid',
                'address.required' => 'Alamat dibutuhkan',
                'address.min' => 'Alamat minimal 8 karakter',
                'password.required' => 'Password dibutuhkan',
                'password.confirmed' => 'Password tidak sama',
                'password.min' => 'Password minimal 8 karakter',
                'profile_img.required' => 'Foto profil dibutuhkan',
                'profile_img.image' => 'Foto profil harus berformat png',
                'profile_img.mimes' => 'Foto profil harus berformat png',
                'profile_img.dimensions' => 'Foto profil harus berdimensi 1:1',
                'profile_img.max' => 'Foto profil maksimal 1MB'
            ]
        );

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'position' => $request->position,
            'skill' => $request->skill,
            'role' => 'Member',
            'status' => 'Pending'
        ];

        $data['profile_img'] = $request->file('profile_img')->storeAs('profile/image', Str::slug($request->name) . '-' . time() . '.png');

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 6; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        $data['acc_code'] = strtoupper(Str::slug($request->name)) . '-' . $randomString;
        $data['password'] = Hash::make($request->password);

        if (User::create($data)) {
            return redirect()->back()->with('success', 'Akun berhasil dibuat, Anda akan mendapatkan email apabila pengurus menerima pendaftaran Anda');
        } else {
            if (Storage::exists($data['profile_img'])) {
                Storage::delete($data['profile_img']);
                return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan ketika mendaftarkan akun. Gambar yang diupload berhasil dihapus');
            } else {
                return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan ketika mendaftarkan akun. Gambar yang diupload tidak dihapus');
            }
        }
    }
}