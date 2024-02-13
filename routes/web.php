<?php

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
use App\Http\Controllers\{AuthController, CrimeController, UserController, RegionController,
OfficeController, CodeController};


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login',[AuthController::class,'getLogin'])->name('getLogin');
Route::post('/admin/login',[AuthController::class,'postLogin'])->name('postLogin');
Route::get('/admin/partials/layout-main',[AuthController::class,'logout'])->name('logout');

Route::get('/admin/crime',[CrimeController::class,'index'])->name('crime');
Route::get('/admin/user',[UserController::class,'index'])->name('user');
Route::get('/admin/region',[RegionController::class,'index'])->name('region');
Route::get('/admin/office',[OfficeController::class,'index'])->name('office');
Route::get('/admin/code',[CodeController::class,'index'])->name('code');