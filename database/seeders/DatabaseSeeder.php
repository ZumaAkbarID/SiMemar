<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\SiMemarConfig;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Rahmat Wahyuma Akbar',
            'email' => 'admin@rahmatwahyumaakbar.com',
            'phone_number' => '081234567890',
            'address' => 'Jl. PLTU Tanjung Jati B, Desa Kaliaman Rt 01 Rw 02',
            'position' => 'CEO & Backend Web Developer',
            'skill' => 'PHP,Laravel,JS,C++',
            'contract_start' => 1667214176,
            'contract_end' => null,
            'account_verified_at' => 1667214176,
            'account_verified_by' => 0,
            'email_verified_at' => now(),
            'profile_img' => 'profile/image/zuma.png',
            'remember_token' => null,
            'role' => 'CEO',
            'status' => 'Aktif',
            'acc_code' => 'CEO-RWA',
            'password' => Hash::make('password'),
        ]);

        SiMemarConfig::factory()->create([
            'app_name' => 'SiMemar',
            'favicon' => 'default/favicon.ico',
            'meta_desc' => 'Star this open source project on https://github.com/ZumaAkbarID',
            'card_front_img' => 'default/card_front_img.png',
            'card_back_img' => 'default/card_back_img.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}