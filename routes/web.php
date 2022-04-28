<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'redirect']);

Route::get('/add_doctor',[AdminController::class,'add_doctor']);
Route::post('/add_doctor',[AdminController::class,'upload_doctor']);

Route::post('/add_appointment',[HomeController::class,'add_appointment']);
Route::get('/user/appointment',[HomeController::class,'my_appointments'])->middleware('auth');
Route::get('/appoints/{appoint}/delete',[HomeController::class,'delete_appoint']);

Route::get('/admin_appoints',[AdminController::class,'show_appoints']);
Route::get('/approveAppoint/{appoint}',[AdminController::class,'approveAppoint']);
Route::get('/cancelAppoint/{appoint}',[AdminController::class,'cancelAppoint']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
