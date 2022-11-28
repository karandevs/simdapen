<?php

use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PktGolController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PensiunController;

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



route::get('/', function () {
    return view('landing');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->resource('pangkat-golongan', PktGolController::class);
Route::middleware(['auth', 'verified'])->resource('jabatan', JabatanController::class);
Route::middleware(['auth', 'verified'])->resource('pegawai', PegawaiController::class);
Route::middleware(['auth', 'verified'])->resource('pensiun', PensiunController::class);
Route::post('pegawai/destroy/{id}', 'PegawaiController@destroy');

# Print guys
Route::get('pensiun/print/{id}', function ($id) {
    $pegawai = Pegawai::with('jabatan','pktgol')->findOrFail($id);
    return view('layouts.papers.legal', compact('pegawai'));
})->name('cetakSurat')->middleware('auth');
