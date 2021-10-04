<?php

use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     //return view('welcome');
//     return view('login');
// });

//Backend
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authentication']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::resource('/posts', GuestbookController::class);

//Front end
Route::get('/guestbook', [GuestController::class, 'create'])->name('guestbook.index');;
Route::post('/addguest', [GuestController::class, 'store']);

//Chain Dropdown
//Route::get('/listcity/{prov}', [GuestController::class, 'citylist']);
