<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\SiMemarConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Card extends Controller
{
    public function __construct()
    {
        $this->SiMemarConfig = SiMemarConfig::first();
    }

    public function view()
    {
        return view('Profile.card', [
            'title' => Auth::user()->name . ' | Kartu',
            'SiMemarConfig' => $this->SiMemarConfig
        ]);
    }
}