<?php

namespace App\Http\Controllers\CEO\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\cv;
use App\Models\SiMemarConfig;
use App\Models\User;
use Illuminate\Http\Request;

class View extends Controller
{
    public function __construct()
    {
        $this->SiMemarConfig = SiMemarConfig::first();
    }

    public function all()
    {
        return view('CEO.Pengurus.all', [
            'title' => 'Kelola Pengurus | ' . $this->SiMemarConfig->app_name,
            'SiMemarConfig' => $this->SiMemarConfig,
        ]);
    }

    public function detail(Request $request)
    {
        $user = User::where('acc_code', $request->acc_code)->first();
        $cv = cv::where('user_id', $user->id)->first();
        return view('CEO.Pengurus.Ajax._detail', [
            'data' => $user,
            'cv' => $cv
        ]);
    }

    public function table(string $status)
    {
        if ($status == 'Aktif') {
            return view('CEO.Pengurus.Ajax._tb_pengurus_active', [
                'pengurusActive' => User::where('role', 'Pengurus')->where('status', 'Aktif')->get()
            ]);
        } else if ($status == 'Non Aktif') {
            return view('CEO.Pengurus.Ajax._tb_pengurus_non_active', [
                'pengurusNonActive' => User::where('role', 'Pengurus')->where('status', 'Non Aktif')->get()
            ]);
        }
    }

    public function counter(string $status)
    {
        if ($status == 'Aktif') {
            return response()->json([
                'status' => 200,
                'msg' => count(User::where('role', 'Pengurus')->where('status', 'Aktif')->get())
            ]);
        } else if ($status == 'Non Aktif') {
            return response()->json([
                'status' => 200,
                'msg' => count(User::where('role', 'Pengurus')->where('status', 'Non Aktif')->get())
            ]);
        }
    }
}