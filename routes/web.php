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

Route::get('/getupdates', function() {
    $updates = Telegram::getMe();
    return (json_encode($updates));
});

Auth::routes();
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/percakapan/{id}', 'TelegramController@percakapan')->name('percakapan');
Route::post('/balas', 'TelegramController@balas')->name('balas');
Route::get('/telegram', 'TelegramController@index')->name('index.telegram');
Route::get('/masalah2', 'TelegramController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chatbox', 'TelegramController@home')->name('chatbox');

Route::get('/data-customer', 'UserController@index')->name('data.customer');
Route::post('broadcast', 'MessageController@broadcast')->name('broadcast');
// Route::post('/1396168790:AAE4LVilrBZ6VUvS56r26b3YPUPtM7jfw80/webhook', 'TelegramController@webhook');

// PENGERJAAN
Route::post('/add-keterangan', 'PengerjaanController@keterangan')->name('keterangan.pengerjaan'); //menambah keterangan

Route::get('/pengerjaan','PengerjaanController@index')->name('pengerjaan'); //pengerjaan sedang berlangsung
Route::get('/riwayat-pengerjaan','PengerjaanController@riwayat')->name('riwayat.pengerjaan'); // riwayat pengerjaan
// END PENGERJAAN
// MANAGE ADMIN
Route::get('/manage-admin','ManageAdmin@index')->name('manage.admin');
Route::post('/manage-admin','ManageAdmin@store')->name('manage.admin.store');

Route::get('/profile','ManageAdmin@profile')->name('profile.admin');
Route::put('/profile','ManageAdmin@update')->name('profile.admin.update');
// END MANAGE ADMIN


Route::get('/list-user', 'MessageController@listUser')->name('user.list-user');
Route::post('create-chat', 'MessageController@store')->name('user.createchat');

Route::post('/webhook', 'Webhook@webhook');
Route::get('/tes', 'Webhook@webhook');
