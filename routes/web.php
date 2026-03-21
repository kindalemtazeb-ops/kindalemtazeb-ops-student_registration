<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. የዌልካም ገጽ
Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
// 2. የተማሪዎች አስተዳደር (Index, Create, Store, Edit, Update, Destroy)
Route::resource('students', StudentController::class);

// 3. የሎጊን እና የሎግ አውት መንገዶች
// Logout አሁን ስለተጨመረ በ Index ገጽ ላይ ያለው ቁልፍ ይሰራል
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* ለጊዜው የቆዩት የሎጊን መንገዶች፦
  Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
  Route::post('/login', [AuthController::class, 'login'])->name('login.post');
*/
