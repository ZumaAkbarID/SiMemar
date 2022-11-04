<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\cv as ModelsCv;
use App\Models\SiMemarConfig;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CV extends Controller
{
    public function __construct()
    {
        $this->SiMemarConfig = SiMemarConfig::first();
    }

    public function form()
    {
        return view('Account.cv', [
            'SiMemarConfig' => $this->SiMemarConfig,
            'title' => 'Pengaturan CV | ' . $this->SiMemarConfig->app_name,
            'cv' => ModelsCv::where('user_id', Auth::user()->id)->first()
        ]);
    }

    public function process(Request $request)
    {
        $cv = ModelsCv::where('user_id', Auth::user()->id)->first();
        $this->validate(
            $request,
            [
                'cv_url' => 'required|mimes:pdf|max:5120'
            ],
            [
                'cv_url.required' => 'CV dibutuhkan',
                'cv_url.mimes' => 'CV harus ber-ekstensi pdf',
                'cv_url.max' => 'CV maksimal 5MB',
            ]
        );

        $oldPdf = $cv->cv_url;

        $data['cv_url'] = $request->file('cv_url')->storeAs('profile/cv', Str::slug(Auth::user()->name) . '-' . time() . '.pdf');

        if (Storage::exists($cv->cv_url) && !is_null($data['cv_url'])) {
            Storage::delete($cv->cv_url);
        }

        if (ModelsCv::where('user_id', Auth::user()->id)->update($data)) {
            return redirect()->back()->with('success', 'Berhasil upload pdf');
        } else {
            return redirect()->back()->with('error', 'Gagal upload pdf');
        }
    }

    public function download($acc_code)
    {
        $cv = ModelsCv::where('user_id', User::where('acc_code', $acc_code)->first()->id)->first();

        return response()->download('storage/' . $cv->cv_url, null, ['Content-Type' => 'Content-Type: application/pdf']);
    }
}