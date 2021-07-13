<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermohonanController;
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
    // return view('welcome');
    return 'Selamat Datang Ke Laravel';
});

// Route::get($uri, $function);
Route::get('login', [LoginController::class, 'paparBorangLogin']);

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



Route::group(['prefix' => 'semakan'], function() {

    Route::get('/', function () {
        // return 'Ini adalah halaman semakan';
        return view('semakan/template_list_semakan');
    });
    
    Route::get('/{id}', function ($id) {
        // return 'Ini adalah halaman semakan permohonan ID: ' . $id;
        $page_title = 'Halaman Semakan';
        //return view('semakan/template_detail_semakan');
        // return view('semakan/template_detail_semakan')->with('id', $id)->with('page_title', $page_title);
        // return view('semakan/template_detail_semakan', ['id' => $id, 'page_title' => $page_title]);

        $input_nama = '<input type="text" name="nama">';

        return view('semakan/template_detail_semakan', compact('id', 'page_title', 'input_nama'));
    });

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
