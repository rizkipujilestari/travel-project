<?php

use App\Http\Controllers\AuthController;
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
    return response(['status' => 403, 'message' => 'Access Forbidden!']);
});

Route::get('/login', function () {
    return response(['status' => 401, 'message' => 'Unauthorized!']);
})->name('login');