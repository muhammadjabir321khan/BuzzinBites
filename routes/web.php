<?php

use App\Http\Controllers\Admincontyroller;
use App\Http\Controllers\Adminlogin;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('admin')->group(function(){
    Route::get('login_form',[Admincontyroller::class,'login']);
    Route::post('store',[Admincontyroller::class,'store']);
    Route::view('admin_dashboard','admin_dashboard')->name('admin.admin_dashboard')->middleware('Admin');


});



