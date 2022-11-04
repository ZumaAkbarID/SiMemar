<?php

namespace App\Http\Controllers\CEO\Member;

use App\Http\Controllers\Controller;
use App\Models\cv;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Delete extends Controller
{
    public function data(Request $request)
    {
        return view('CEO.Member.Ajax._delete', [
            'data' => User::where('acc_code', $request->acc_code)->first()
        ]);
    }

    public function confirm(Request $request)
    {
        $user = User::where('id', $request->uid)->where('acc_code', $request->acc_code)->first();
        $cv = cv::where('user_id', $user->id)->first();
        if ($user && Storage::exists($user->profile_img)) {
            Storage::delete($user->profile_img);
        }
        if ($cv && Storage::exists($cv->cv_url)) {
            Storage::delete($cv->cv_url);
        }
        if ($user->delete()) {
            return response()->json([
                'status' => 200,
                'msg' => 'Data berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'msg' => 'Gagal menghapus data <b>' . $user->name . '</b>'
            ]);
        }
    }
}