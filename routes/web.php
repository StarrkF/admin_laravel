<?php

use App\Http\Controllers\Admin\ModuleController;
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

Route::get('/',function(){ return view('admin.pages.dashboard');})->name('admin.dashboard');


Route::get('/modules',[ModuleController::class,'index'])->name('admin.modules');
Route::post('/modules',[ModuleController::class,'insert'])->name('admin.insert.modules');
