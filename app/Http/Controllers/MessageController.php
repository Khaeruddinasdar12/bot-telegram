<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Telegramuser;
use DB;
use Telegram;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
class MessageController extends Controller
{
    public function listUser() //list dokter navside
	{
		$user = Telegramuser::orderBy('updated_at', 'desc')->get();
		
		return $user;
	}
	
	public function broadcast(Request $request) //kirim pesan siaran
	{
		$user = Telegramuser::get();
		foreach($user as $usr) {
		    $balas = Telegram::sendMessage([
                'chat_id' => $usr->id,
                'parse_mode' => 'HTML',
                'text' => $request->pesan
            ]);
		}
		return $arrayName = array('status' => 'success' , 'pesan' => 'Berhasil mengirim pesan siaran');
	}
}
