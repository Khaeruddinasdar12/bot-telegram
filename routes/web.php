<?php

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
Route::get('/inbox', 'TelegramController@home')->name('beranda');
Route::get('/telegram', 'TelegramController@index')->name('index.telegram');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chatbox', 'Chat@index')->name('chatbox');

Route::post('/1396168790:AAE4LVilrBZ6VUvS56r26b3YPUPtM7jfw80/webhook', function () {
    $update = Telegram::commandsHandler(true);
});

Route::get('/setwebhook', function () {
	$response = Telegram::setWebhook(['url' => 'https://localhost:8000/1396168790:AAE4LVilrBZ6VUvS56r26b3YPUPtM7jfw80/webhook']);
	dd($response);
});
