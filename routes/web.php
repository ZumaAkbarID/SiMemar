<?php

use App\Http\Controllers\Account\CV;
use App\Http\Controllers\Account\Settings as AccountSettings;
use App\Http\Controllers\Auth\Login as AuthLogin;
use App\Http\Controllers\Auth\Logout as AuthLogout;
use App\Http\Controllers\Auth\Register as AuthRegister;
use App\Http\Controllers\CEO\Pengurus\Add as CEOPengurusAdd;
use App\Http\Controllers\CEO\Pengurus\View as CEOPengurusView;
use App\Http\Controllers\CEO\Pengurus\Edit as CEOPengurusEdit;
use App\Http\Controllers\CEO\Pengurus\Delete as CEOPengurusDelete;
use App\Http\Controllers\CEO\Member\View as CEOMemberView;
use App\Http\Controllers\CEO\Member\Edit as CEOMemberEdit;
use App\Http\Controllers\CEO\Member\Delete as CEOMemberDelete;
use App\Http\Controllers\Dashboard\Dashboard;
use App\Http\Controllers\SiMemar\Config as SiMemarConfig;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/cv/{acc_code}', function ($acc_code) {
    return $acc_code;
})->name('Qr_Scan');

Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function () {
    // Force Redirect
    Route::get('', function () {
        return redirect(route('Auth_login'));
    });

    // Register
    Route::get('register', [AuthRegister::class, 'form'])->name('Auth_register');
    Route::post('register', [AuthRegister::class, 'process']);

    // Login
    Route::get('login', [AuthLogin::class, 'form'])->name('Auth_login');
    Route::post('login', [AuthLogin::class, 'process']);
});

Route::group(['middleware' => 'auth'], function () {
    // Logout
    Route::get('logout', [AuthLogout::class, 'logout'])->prefix('auth')->name('Auth_logout');

    // Dashboard
    Route::get('/', [Dashboard::class, 'dashboard'])->name('Dashboard_index');

    // Pengaturan Akun semua role
    Route::group(['prefix' => 'account'], function () {
        Route::get('settings', [AccountSettings::class, 'form'])->name('Account_settings');
        Route::post('settings', [AccountSettings::class, 'process']);

        // CV
        Route::get('cv', [CV::class, 'form'])->name('Account_cv');
        Route::post('cv', [CV::class, 'process']);
        // Download CV
        Route::get('cv/download/{acc_code}', [CV::class, 'download'])->name('Account_cv_download');
    });

    // CEO
    Route::group(['prefix' => 'ceo', 'middleware' => 'isCEO'], function () {
        // Kelola Pengurus
        Route::group(['prefix' => 'pengurus'], function () {
            Route::get('kelola', [CEOPengurusView::class, 'all'])->name('CEO_pengurus_all');
            Route::post('kelola', [CEOPengurusAdd::class, 'add'])->name('CEO_pengurus_add');
            Route::post('get-tb/{status}', [CEOPengurusView::class, 'table'])->name('CEO_pengurus_get_table');
            Route::post('get-counter/{status}', [CEOPengurusView::class, 'counter'])->name('CEO_pengurus_get_counter');
            Route::post('get-single', [CEOPengurusView::class, 'detail'])->name('CEO_pengurus_detail');
            Route::post('edit', [CEOPengurusEdit::class, 'form'])->name('CEO_pengurus_edit_form');
            Route::post('submit', [CEOPengurusEdit::class, 'update'])->name('CEO_pengurus_edit_submit');
            Route::post('data-delete', [CEOPengurusDelete::class, 'data'])->name('CEO_pengurus_delete_ask');
            Route::post('confirm-delete', [CEOPengurusDelete::class, 'confirm'])->name('CEO_pengurus_delete_confirm');
        });

        // Kelola Member
        Route::group(['prefix' => 'member'], function () {
            Route::get('kelola', [CEOMemberView::class, 'all'])->name('CEO_member_all');
            Route::post('get-tb/{status}', [CEOMemberView::class, 'table'])->name('CEO_member_get_table');
            Route::post('get-counter/{status}', [CEOMemberView::class, 'counter'])->name('CEO_member_get_counter');
            Route::post('get-single', [CEOMemberView::class, 'detail'])->name('CEO_member_detail');
            Route::post('edit', [CEOMemberEdit::class, 'form'])->name('CEO_member_edit_form');
            Route::post('submit', [CEOMemberEdit::class, 'update'])->name('CEO_member_edit_submit');
            Route::post('data-delete', [CEOMemberDelete::class, 'data'])->name('CEO_member_delete_ask');
            Route::post('confirm-delete', [CEOMemberDelete::class, 'confirm'])->name('CEO_member_delete_confirm');
        });

        Route::group(['prefix' => 'simemar'], function () {
            Route::get('settings', [SiMemarConfig::class, 'form'])->name('SiMemar_config');
            Route::post('settings', [SiMemarConfig::class, 'update']);
        });
    });
});