<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\cv;
use App\Models\SiMemarConfig;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->SiMemarConfig = SiMemarConfig::first();
    }

    public function dashboard()
    {
        if (Auth::user()->role == 'CEO') {
            $data = [
                'accActive' => User::where('role', '!=', 'CEO')->where('status', 'Aktif')->get(),
                'accPending' => User::where('role', '!=', 'CEO')->where('status', 'Pending')->get(),
                'accRejected' => User::where('role', '!=', 'CEO')->where('status', 'Rejected')->get(),
                'accNonActive' => User::where('role', '!=', 'CEO')->where('status', 'Non Aktif')->get(),
                'acc5Latest' => User::where('role', '!=', 'CEO')->limit(5)->latest()->get(),
            ];
        } else if (Auth::user()->role !== 'CEO') {
            $data['cv'] = cv::where('user_id', Auth::user()->id)->first();
        }

        $data['SiMemarConfig'] = $this->SiMemarConfig;
        $data['title'] = 'Dashboard | ' . $this->SiMemarConfig->app_name;

        return view('Dashboard.dashboard', $data);
    }
}
