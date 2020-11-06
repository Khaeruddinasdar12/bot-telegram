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
Route::get('/beranda', 'TelegramController@home')->name('beranda');
Route::get('/percakapan/{id}', 'TelegramController@percakapan')->name('percakapan');
Route::get('/telegram', 'TelegramController@index')->name('index.telegram');
Route::get('/masalah2', 'TelegramController@index');
Route::get('/home', 'HomeController@index')->name('home');

// Route::post('/1396168790:AAE4LVilrBZ6VUvS56r26b3YPUPtM7jfw80/webhook', 'TelegramController@webhook');
Route::post('/webhook', 'Webhook@webhook');
 
// 	// return 'haha';
// 	https://api.telegram.org/bot508504087:AAH82eIwsPib-TcFlnno6yVidfRL0igpcss/sendmessage?chat_id=508798389&text=hehe
//     $update = Telegram::commandsHandler(true);
// });

// Route::get('/test', function() {

// });

Route::get('/setwebhook', function () {
	$response = Telegram::setWebhook(['url' => 'https://52616d5f3239.ngrok.io/bot/public/telegram']);
	// dd($response);
	return 'hahah';
});