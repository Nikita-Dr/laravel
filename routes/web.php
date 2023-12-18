<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyControler;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing_back', [MyControler::class, 'getConcerts']);
Route::get('/landing_back/file/{name}', [MyControler::class, 'getFile']);

Route::get('/landing_back/image/{name}', [MyControler::class, 'getImage']);
Route::get('/landing_back/sample/{name}', [MyControler::class, 'getSample']);
Route::get('/landing_back/text/{name}', [MyControler::class, 'getText']);
