<?php

namespace App\Http\Controllers\Pengurus\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Edit extends Controller
{
    public function form(Request $request)
    {
        return view('Pengurus.Member.Ajax._edit', [
            'data' => User::where('acc_code', $request->acc_code)->first()
        ]);
    }

    public function update(Request $request)
    {
        $user = User::where('id', $request->uid)->where('acc_code', $request->acc_code)->where('role', 'Member')->first();
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|email:dns,rfc|unique:users,email,' . $user->id,
                'phone_number' => 'required|numeric|min:8',
                'address' => 'required|min:8',
            ],
            [
                'name.required' => 'Nama dibutuhkan',
                'email.required' => 'Email dibutuhkan',
                'email.unique' => 'Email telah digunakan',
                'email.email' => 'Email tidak valid',
                'phone_number.required' => 'Nomor HP dibutuhkan',
                'phone_number.numeric' => 'Nomor HP tidak valid',
                'phone_number.min' => 'Nomor HP tidak valid',
                'address.required' => 'Alamat dibutuhkan',
                'address.min' => 'Alamat minimal 8 karakter',
                'password.required' => 'Password dibutuhkan',
                'password.confirmed' => 'Password tidak sama',
                'password.min' => 'Password minimal 8 karakter',
            ]
        );

        if (User::where('phone_number', $request->phone_number)->where('id', '!=', $user->id)->count() !== 0) {
            return redirect()->back()->with('error', 'Nomor HP telah digunakan');
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->phone_number,
            'position' => $request->position,
            'contract_start' => $request->contract_start,
            'contract_end' => $request->contract_end,
            'skill' => $request->skill,
            'role' => $request->role,
            'status' => $request->status,
            'address' => $request->address
        ];

        if ($request->hasFile('profile_img')) {
            $this->validate(
                $request,
                [
                    'profile_img' => 'required|image|mimes:png|max:1024|dimensions:ratio=1/1'
                ],
                [
                    'profile_img.required' => 'Foto profil dibutuhkan',
                    'profile_img.image' => 'Foto profil harus berformat png',
                    'profile_img.mimes' => 'Foto profil harus berformat png',
                    'profile_img.dimensions' => 'Foto profil harus berdimensi 1:1',
                    'profile_img.max' => 'Foto profil maksimal 1MB'
                ]
            );
            $data['profile_img'] = $request->file('profile_img')->storeAs('profile/image', Str::slug($request->name) . '-' . time() . '.png');
            $oldImg = $user->profile_img;

            if (!is_null($request->password)) {
                $data['password'] = Hash::make($request->password);
            }
        }

        if (User::find($user->id)->update($data)) {
            if ($request->hasFile('profile_img')) {
                Storage::delete($oldImg);
            }
            return redirect()->back()->with('success', 'Akun berhasil diperbarui');
        } else {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan ketika memperbarui akun');
        }
    }
}