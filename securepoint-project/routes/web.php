<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', Controllers\Upload\UploadViewController::class)->name('uploads.index');
Route::post('uploads/store', Controllers\Upload\UploadFileController::class)->name('uploads.store');
Route::get('/uploads/show', Controllers\ShowFile\ShowFileController::class)->name('uploads.show');
Route::post('uploads/load', Controllers\LoadFileToAccess\LoadFileToAccessController::class)->name('uploads.load');
Route::get('/uploads/getMost', Controllers\GetMostAccess\GetMostAccessController::class)->name('uploads.showMostAccess');
