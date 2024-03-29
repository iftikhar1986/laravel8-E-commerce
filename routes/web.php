<?php

use App\Http\Controllers\AdminController;

use App\Http\Controllers\Frontend\IndexController;

use App\Http\Controllers\Backend\AdminProfileController;


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


Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){

    Route::get('/login',[AdminController::class,'loginForm']);
    Route::post('/login',[AdminController::class,'store'])->name('admin.login');

});


/* Admin Routes */
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('/admin/profile',[AdminProfileController::class,'index'])->name('admin.profile');
Route::get('/admin/profile/edit',[AdminProfileController::class,'edit'])->name('admin.profile.edit');
Route::post('/admin/profile/store',[AdminProfileController::class,'store'])->name('admin.profile.store');
Route::get('/admin/change/password',[AdminProfileController::class,'changePassword'])->name('admin.change.password');
Route::post('/update/change/password',[AdminProfileController::class,'update'])->name('update.change.password');







/* User Routes */
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/',[IndexController::class,'index']);

