<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\Admin\CategoryController;


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
require __DIR__.'/auth.php';

//Auth pages Routs
Route::group(['prefix' => 'admin','middleware' => ['auth', 'verified']], function() {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admindashboard');

    Route::resource('category', CategoryController::class);

    //user profile routes
    Route::get('editprofile',[UserController::class, 'editprofile'])->name('editprofile');
    Route::post('editprofile',[UserController::class, 'update']);  
    Route::post('changepassword',[UserController::class, 'updatePassword'])->name('change.password');
    Route::post('profileimage',[UserController::class, 'updateProfileImage'])->name('change.profileimage');
});

Route::post('api/fetch-states', [DropdownController::class, 'fetchState'])->name('fetchstate');
Route::get('api/fetch-cities', [DropdownController::class, 'fetchCity'])->name('fetchcity');
Route::get('api/freetoken', [DropdownController::class, 'getfreetoken'])->name('gettoken');