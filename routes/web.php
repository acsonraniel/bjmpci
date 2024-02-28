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

Route::group(['middleware' => ['admin_auth']], function () {
    // Accessible to all authenticated users
    Route::get('/admin/crime', [CrimeController::class, 'index'])->name('crime');
    
    // Accessible to 'Super Admin' and 'Administrator'
    Route::group(['middleware' => ['check_role:Super Admin,Administrator']], function () {
        Route::get('/admin/user', [UserController::class, 'index'])->name('user');
        Route::get('/admin/region', [RegionController::class, 'index'])->name('region');
        Route::get('/admin/office', [OfficeController::class, 'index'])->name('office');
        Route::get('/admin/code', [CodeController::class, 'index'])->name('code');
    });

    // Resource routes accessible to 'Administrator' and 'Super Admin'
    Route::group(['middleware' => ['check_role:Super Admin,Administrator']], function () {
        Route::resource('/code', CodeController::class);
        Route::resource('/region', RegionController::class);
        Route::resource('/office', OfficeController::class);
        Route::resource('/user', UserController::class);
        Route::resource('/crime', CrimeController::class);
    });

    // Additional route
    Route::get('/get-offices/{regionId}', [UserController::class, 'getOffices']);

    // Logout route
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});



