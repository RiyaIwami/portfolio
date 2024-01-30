<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\MyPage\ProfileController;
use App\Http\Requests\EditRequest;
use App\Http\Requests\AddRequest;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;

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

Route::group(['prefix' => 'logs', 'middleware' => ['auth']], function () {
    Route::get('/', [LogsController::class, 'showLogs'])->name('top');
    Route::get('/{log_id}', [LogsController::class, 'showLogDetail'])->name('log');
});

Route::group(['prefix' => 'add', 'middleware' => ['auth']],
function(){
    Route::get('/', [AddController::class, 'showAddForm'])->name('add.form');
    Route::post('/',[AddController::class, 'addLog'])->name('add');
});

Route::group(['prefix' => 'mypage', 'as' => 'mypage.', 'middleware' => ['auth']], function () {
    Route::get('/edit-profile', [ProfileController::class, 'showProfileEditForm'])->name('edit-profile.form');
    Route::post('/edit-profile', [ProfileController::class, 'editProfile'])->name('edit-profile');
});

Auth::routes(['reset' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::get('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::get('/forgot-password', [ResetPasswordController::class, 'showForgotPasswordForm'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [ResetPasswordController::class, 'sendResetLinkEmail'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
    ->middleware('guest')
    ->name('password.update');

