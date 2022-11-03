<?php

namespace App\Http\Controllers\SiMemar;

use App\Http\Controllers\Controller;
use App\Models\SiMemarConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Config extends Controller
{
    public function __construct()
    {
        $this->SiMemarConfig = SiMemarConfig::first();
    }

    public function form()
    {
        return view('SiMemar.form', [
            'title' => 'Pengaturan | ' . $this->SiMemarConfig->app_name,
            'SiMemarConfig' => $this->SiMemarConfig
        ]);
    }

    public function update(Request $request)
    {
        if ($request->type == 'text') {
            $this->validate(
                $request,
                [
                    'app_name' => 'required',
                    'meta_desc' => 'max:180',
                ],
                [
                    'app_name.required' => 'Nama Website dibutuhkan',
                    'meta_desc.max' => 'Deskripsi Meta maksimal 180 karakter',
                ]
            );

            $data = [
                'app_name' => $request->app_name,
            ];
            if (!is_null($request->meta_desc)) {
                $data['meta_desc'] = $request->meta_desc;
            }

            if ($this->SiMemarConfig->update($data)) {
                return redirect()->back()->with('success', 'Berhasil memperbarui Config');
            } else {
                return redirect()->back()->with('error', 'Gagal memperbarui Config');
            }
        } else if ($request->type == 'image') {
            $favicon = false;
            $meta_img = false;
            $card_front = false;
            $card_back = false;
            if ($request->hasFile('favicon')) {
                $this->validate(
                    $request,
                    [
                        'favicon' => 'required|image|mimes:png,jpg,ico|max:1024|dimensions:1/1'
                    ],
                    [
                        'favicon.required' => 'Favicon dibutuhkan',
                        'favicon.image' => 'Favicon harus berupa gambar',
                        'favicon.mimes' => 'Favicon hanya bisa ber-ekstensi png, jpg, ico',
                        'favicon.max' => 'Favicon maksimal 1MB',
                        'favicon.dimensions' => 'Favicon harus memiliki aspek rasio 1:1',
                    ]
                );
                $data = [];
                if (Storage::exists($this->SiMemarConfig->favicon)) {
                    Storage::delete($this->SiMemarConfig->favicon);
                } else {
                    $data['favicon'] = $request->file('favicon')->storeAs('default', 'favicon.ico');
                }
                if ($this->SiMemarConfig->update($data)) {
                    $favicon = true;
                } else {
                    $favicon = 'error';
                }
            }

            if ($request->hasFile('meta_img')) {
                $this->validate(
                    $request,
                    [
                        'meta_img' => 'required|image|mimes:png,jpg,svg|max:2048|dimensions:max_width=1200,max_height=628'
                    ],
                    [
                        'meta_img.required' => 'Gambar Meta dibutuhkan',
                        'meta_img.image' => 'Gambar Meta harus berupa gambar',
                        'meta_img.mimes' => 'Gambar Meta hanya bisa ber-ekstensi png, jpg, svg',
                        'meta_img.max' => 'Gambar Meta maksimal 2MB',
                        'meta_img.dimensions' => 'Gambar Meta maksimal memiliki ukuran 1200 x 628',
                    ]
                );
                $data = [];
                if (!is_null($this->SiMemarConfig->meta_img) && Storage::exists($this->SiMemarConfig->meta_img)) {
                    Storage::delete($this->SiMemarConfig->meta_img);
                    $data['meta_img'] = $request->file('meta_img')->storeAs('default', 'meta_img.' . $request->file('meta_img')->getClientOriginalExtension());
                } else {
                    $data['meta_img'] = $request->file('meta_img')->storeAs('default', 'meta_img.' . $request->file('meta_img')->getClientOriginalExtension());
                }
                if ($this->SiMemarConfig->update($data)) {
                    $meta_img = true;
                } else {
                    $meta_img = 'error';
                }
            }

            if ($request->hasFile('card_front_img')) {
                $this->validate(
                    $request,
                    [
                        'card_front_img' => 'required|image|mimes:png,jpg,svg|max:2048|dimensions:max_width=250,max_height=100'
                    ],
                    [
                        'card_front_img.required' => 'Gambar Meta dibutuhkan',
                        'card_front_img.image' => 'Gambar Meta harus berupa gambar',
                        'card_front_img.mimes' => 'Gambar Meta hanya bisa ber-ekstensi png, jpg, svg',
                        'card_front_img.max' => 'Gambar Meta maksimal 2MB',
                        'card_front_img.dimensions' => 'Gambar Meta maksimal memiliki ukuran 250 x 100',
                    ]
                );
                $data = [];
                if (!is_null($this->SiMemarConfig->card_front_img) && Storage::exists($this->SiMemarConfig->card_front_img)) {
                    Storage::delete($this->SiMemarConfig->card_front_img);
                    $data['card_front_img'] = $request->file('card_front_img')->storeAs('default', 'card_front_img.' . $request->file('card_front_img')->getClientOriginalExtension());
                } else {
                    $data['card_front_img'] = $request->file('card_front_img')->storeAs('default', 'card_front_img.' . $request->file('card_front_img')->getClientOriginalExtension());
                }
                if ($this->SiMemarConfig->update($data)) {
                    $card_front_img = true;
                } else {
                    $card_front_img = 'error';
                }
            }

            if ($request->hasFile('card_back_img')) {
                $this->validate(
                    $request,
                    [
                        'card_back_img' => 'required|image|mimes:png,jpg,svg|max:2048|dimensions:max_width=250,max_height=350'
                    ],
                    [
                        'card_back_img.required' => 'Gambar Meta dibutuhkan',
                        'card_back_img.image' => 'Gambar Meta harus berupa gambar',
                        'card_back_img.mimes' => 'Gambar Meta hanya bisa ber-ekstensi png, jpg, svg',
                        'card_back_img.max' => 'Gambar Meta maksimal 2MB',
                        'card_back_img.dimensions' => 'Gambar Meta maksimal memiliki ukuran 250 x 350',
                    ]
                );
                $data = [];
                if (!is_null($this->SiMemarConfig->card_back_img) && Storage::exists($this->SiMemarConfig->card_back_img)) {
                    Storage::delete($this->SiMemarConfig->card_back_img);
                    $data['card_back_img'] = $request->file('card_back_img')->storeAs('default', 'card_back_img.' . $request->file('card_back_img')->getClientOriginalExtension());
                } else {
                    $data['card_back_img'] = $request->file('card_back_img')->storeAs('default', 'card_back_img.' . $request->file('card_back_img')->getClientOriginalExtension());
                }
                if ($this->SiMemarConfig->update($data)) {
                    $card_back_img = true;
                } else {
                    $card_back_img = 'error';
                }
            }

            if ($favicon == 'error' || $meta_img == 'error' || $card_front == 'error' || $card_back == 'error') {
                return redirect()->back()->with('error', 'Beberapa sistem terjadi kesalahan');
            } else {
                return redirect()->back()->with('success', 'Berhasil memperbarui config');
            }
        }
    }
}