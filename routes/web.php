<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoservisasController AS AC;
use App\Http\Controllers\MechanikasController AS MC;
use App\Http\Controllers\PaslaugaController AS PC;

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

Route::get('/auto', [AC::class, 'index'])->name('ac_index');
Route::get('/auto/create', [AC::class, 'create'])->name('ac_create');
Route::post('/auto/create', [AC::class, 'store'])->name('ac_store');
Route::get('/auto/edit/{aService}', [AC::class, 'edit'])->name('ac_edit');
Route::put('/auto/{aService}', [AC::class, 'update'])->name('ac_update');
Route::delete('/auto/{aService}', [AC::class, 'destroy'])->name('ac_delete');
Route::get('/auto/show/{id}', [AC::class, 'show'])->name('ac_show');

Route::get('/mechanic', [MC::class, 'index'])->name('mc_index');
Route::get('/mechanic/create', [MC::class, 'create'])->name('mc_create');
Route::post('/mechanic/create', [MC::class, 'store'])->name('mc_store');
Route::get('/mechanic/edit/{mechanic}', [MC::class, 'edit'])->name('mc_edit');
Route::put('/mechanic/{mechanic}', [MC::class, 'update'])->name('mc_update');
Route::delete('/mechanic/{mechanic}', [MC::class, 'destroy'])->name('mc_delete');
Route::get('/mechanic/show/{id}', [MC::class, 'show'])->name('mc_show');

Route::get('/paslauga', [PC::class, 'index'])->name('pc_index');
Route::get('/paslauga/create', [PC::class, 'create'])->name('pc_create');
Route::post('/paslauga/create', [PC::class, 'store'])->name('pc_store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

