<?php

use App\Http\Livewire\Bimbingan;
use App\Http\Livewire\Disertasi;
use App\Http\Livewire\File;
use App\Http\Livewire\Lecturer;
use App\Http\Livewire\ProsesDisertasi;
use App\Http\Livewire\Staff;
use App\Http\Livewire\Student;
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


Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('tasks', \App\Http\Controllers\TasksController::class);

    Route::resource('users', \App\Http\Controllers\UsersController::class);

    Route::get('mahasiswa', Student::class)->name('student');
    Route::get('lecturer', Lecturer::class)->name('lecturer');
    Route::get('staff', Staff::class)->name('staff');
    Route::get('proses_disertasi', ProsesDisertasi::class)->name('proses_disertasi');
    Route::get('disertasi', Disertasi::class)->name('disertasi');
    Route::get('bimbingan', Bimbingan::class)->name('bimbingan');
    Route::get('file', File::class)->name('file');

});
