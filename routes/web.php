<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// mahasiswa
Route::group(['middleware' => ['auth','cekRole:mahasiswa']], function(){


});

// mahasiswa
Route::group(['middleware' => ['auth','cekRole:mahasiswa']], function(){

    // profile
    Route::get('mahasiswa/profile', 'App\Http\Controllers\UserController@profile');
    Route::post('mahasiswa/editProfile/{userID}', 'App\Http\Controllers\UserController@editProfile');
    Route::post('mahasiswa/deleteProfile/{userID}', 'App\Http\Controllers\UserController@deleteProfile');
    Route::post('mahasiswa/profile/gantiFoto/{userID}/{namaFoto}', 'App\Http\Controllers\UserController@gantiFoto');
    // notes
    Route::get('mahasiswa/notes/{filter}', 'App\Http\Controllers\NotesController@index');
    Route::post('mahasiswa/newNotes/{userID}', 'App\Http\Controllers\NotesController@store');
    Route::post('mahasiswa/deleteNote/{note_id}', 'App\Http\Controllers\NotesController@destroy');
    Route::post('mahasiswa/editNotes/{note_id}', 'App\Http\Controllers\NotesController@update');


    // pengumuman
    Route::get('/pengumuman', 'App\Http\Controllers\PengumumanController@index');
    Route::post('/pengumuman/aksi/{filter}/{pengumuman_id}', 'App\Http\Controllers\PengumumanController@aksi');
});

// admin
Route::group(['middleware' => ['auth','cekRole:admin']], function(){
    // daftar user
    Route::get('admin/daftarUser', 'App\Http\Controllers\UserController@daftarUser');
    Route::post('admin/deleteUser/{userId}', 'App\Http\Controllers\UserController@deleteUser');
    Route::post('admin/tambahkanDosen', 'App\Http\Controllers\UserController@tambahUser');

    // learning path
    Route::get('admin/learningPath', 'App\Http\Controllers\LearningPathController@index');
    Route::get('learningPath/detail/{bp_id}', 'App\Http\Controllers\LearningPathController@bpDetail');
    Route::get('learningPath/{namaBp}', 'App\Http\Controllers\LearningPathController@belajarBP');
    Route::post('admin/tambahBahasaPemograman', 'App\Http\Controllers\BahasaPemogramanController@store');
    Route::post('admin/tambahTopikBP', 'App\Http\Controllers\BahasaPemogramanController@tambahTopikBP');
    Route::post('admin/tambahLearningPath', 'App\Http\Controllers\LearningPathController@store');

    // pengumuman
    Route::get('/pengumuman', 'App\Http\Controllers\PengumumanController@index');
    Route::get('/admin/aturPengumuman', 'App\Http\Controllers\PengumumanController@aturPengumuman');
    Route::get('/admin/hapusPengumuman/{pengumumanId}', 'App\Http\Controllers\PengumumanController@destroy');
    Route::post('/pengumuman/aksi/{filter}/{pengumuman_id}', 'App\Http\Controllers\PengumumanController@aksi');
    Route::post('/admin/tambahkanPengumuman', 'App\Http\Controllers\PengumumanController@store');

    // atur tapilan
    Route::get('admin/aturTampilan/{filter}', 'App\Http\Controllers\HomeController@aturTampilan');
});
