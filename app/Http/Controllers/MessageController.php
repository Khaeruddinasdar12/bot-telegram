<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Telegramuser;
use DB;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
class MessageController extends Controller
{
    public function listUser() //list dokter navside
	{
		$auth_id = Auth::user()->id; // user yang sedang login

		//dokter yang pernah chat dengan user
		// $dokter = DB::select(DB::raw("select inboxes.dokter_id.chat_id, max(chats.created_at) as waktu, dokters.name from chats join dokters on chats.dokter_id = dokters.id where chats.user_id = $auth_id group by chats.dokter_id, dokters.name  order by max(inboxes.created_at) desc, chats.dokter_id"));
		$user = Telegramuser::orderBy('created_at', 'desc')->get();
		
		return $user;
	}
}
