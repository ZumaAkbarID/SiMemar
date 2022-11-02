<?php

namespace App\Http\Controllers\CEO\Member;

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
        return view('CEO.Member.all', [
            'title' => 'Kelola Member | ' . $this->SiMemarConfig->app_name,
            'SiMemarConfig' => $this->SiMemarConfig,
        ]);
    }

    public function detail(Request $request)
    {
        $user = User::where('acc_code', $request->acc_code)->first();
        $cv = cv::where('user_id', $user->id)->first();
        return view('CEO.Member.Ajax._detail', [
            'data' => $user,
            'cv' => $cv
        ]);
    }

    public function table(string $status)
    {
        if ($status == 'Aktif') {
            return view('CEO.Member.Ajax._tb_member_active', [
                'memberActive' => User::where('role', 'Member')->where('status', 'Aktif')->get()
            ]);
        } else if ($status == 'Non Aktif') {
            return view('CEO.Member.Ajax._tb_member_non_active', [
                'memberNonActive' => User::where('role', 'Member')->where('status', 'Non Aktif')->get()
            ]);
        } else if ($status == 'Pending') {
            return view('CEO.Member.Ajax._tb_member_pending', [
                'memberPending' => User::where('role', 'Member')->where('status', 'Pending')->where('account_verified_at', null)->get()
            ]);
        } else if ($status == 'Ditolak') {
            return view('CEO.Member.Ajax._tb_member_rejected', [
                'memberRejected' => User::where('role', 'Member')->where('status', 'Ditolak')->where('account_verified_at', null)->get()
            ]);
        }
    }

    public function counter(string $status)
    {
        if ($status == 'Aktif') {
            return response()->json([
                'status' => 200,
                'msg' => count(User::where('role', 'Member')->where('status', 'Aktif')->get())
            ]);
        } else if ($status == 'Non Aktif') {
            return response()->json([
                'status' => 200,
                'msg' => count(User::where('role', 'Member')->where('status', 'Non Aktif')->get())
            ]);
        } else if ($status == 'Pending') {
            return response()->json([
                'status' => 200,
                'msg' => count(User::where('role', 'Member')->where('status', 'Pending')->get())
            ]);
        } else if ($status == 'Ditolak') {
            return response()->json([
                'status' => 200,
                'msg' => count(User::where('role', 'Member')->where('status', 'Ditolak')->get())
            ]);
        }
    }
}