<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\SemakanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/install', function () {
    Artisan::call('migrate', ['--force' => true, '--seed' => true]);
});

Route::get('/', function () {
    // return view('welcome');
    return 'Selamat Datang Ke Laravel';
});

// Route::get($uri, $function);
Route::get('login', [LoginController::class, 'paparBorangLogin'])->name('login');
Route::post('login', [LoginController::class, 'semakLogin'])->name('semak.login');
Route::get('signout', [LoginController::class, 'logout']);

Route::get('dashboard', function () {
    return 'Ini adalah halaman dashboard';
});
// Route untuk memaparkan senarai permohonan
Route::get('permohonan', [PermohonanController::class, 'senarai']);
// Route untuk paparkan borang permohonan
Route::get('permohonan/baru', [PermohonanController::class, 'paparBorang']);
// Routing untuk laravel 7 dan ke bawah
// Route::get('permohonan/baru', 'App\Http\Controller\PermohonanController@paparBorang');
Route::post('permohonan/baru', [PermohonanController::class, 'simpanData']);
// Route untuk edit permohonan
Route::get('permohonan/{id}', [PermohonanController::class, 'edit'])->where('id', '[0-9]+');
Route::patch('permohonan/{id}', [PermohonanController::class, 'update']);
Route::delete('permohonan/{id}', [PermohonanController::class, 'destroy']);

Route::group(['prefix' => 'semakan', 'middleware' => 'auth'], function() {

    // Route standard untuk proses CRUD (Create Read Update Delete)
    Route::get('/', [SemakanController::class, 'index']);
    Route::get('/baru', [SemakanController::class, 'create']);
    Route::post('/baru', [SemakanController::class, 'store']);
    Route::get('/{id}', [SemakanController::class, 'edit']);
    Route::patch('/{id}', [SemakanController::class, 'update']);
    Route::delete('/{id}', [SemakanController::class, 'destroy']);

});

Route::get('/facebook', function() {
    return redirect('https://facebook.com');
});

// Route::get('semakan/data/{id?}', function ($id = null) {
//     if ($id == null)
//     {
//         return 'Tiada ID yang dibekalkan';
//     }
//     return 'Ini adalah halaman semakan permohonan ID: ' . $id;
// });
