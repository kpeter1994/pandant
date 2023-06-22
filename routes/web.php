<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EduController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\WorkCenterController;
use App\Http\Controllers\WorkOrderController;


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


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');


Route::resource('posts',PostController::class)->middleware('auth');

Route::resource('edu',EduController::class)->middleware('auth');

Route::resource('category',CategoryController::class)->middleware('auth');

Route::resource('equipment',EquipmentController::class)->middleware('auth');

Route::resource('work-center',WorkCenterController::class)->middleware('auth');

Route::resource('error',ErrorController::class)->middleware('auth');

Route::get('error/create/{id}', [ErrorController::class, 'create'])->name('error.create');


Route::resource('/work-orders', WorkOrderController::class)->middleware('auth');

/*Tools*/

Route::get('pax-error', [ToolController::class,'paxError'])->name('pax-error')->middleware('auth');
