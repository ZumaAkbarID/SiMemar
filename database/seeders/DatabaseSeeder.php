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
            'phone_number' => '081225389903',
            'address' => 'Jl. PLTU Tanjung Jati B, Desa Kaliaman Rt 01 Rw 02',
            'position' => 'CEO & Backend Web Developer',
            'skill' => 'PHP,Laravel,JS,C++',
            'contract_start' => 1667214176,
            'contract_end' => null,
            'account_verified_at' => 1667214176,
            'account_verified_by' => 0,
            'email_verified_at' => now(),
            'remember_token' => null,
            'role' => 'CEO',
            'status' => 'Aktif',
            'acc_code' => 'CEO-RWA',
            'password' => Hash::make('password'),
        ]);

        SiMemarConfig::factory()->create([
            'app_name' => 'SiMemar',
            'favicon' => '/storage/default/favicon.ico',
        ]);
    }
}