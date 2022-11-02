<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SiMemarConfig;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->SiMemarConfig = SiMemarConfig::first();
    }

    public function dashboard()
    {
        return view('Dashboard.dashboard', [
            'SiMemarConfig' => $this->SiMemarConfig,
            'title' => 'Dashboard | ' . $this->SiMemarConfig->app_name,
        ]);
    }
}