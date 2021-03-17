<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;
use App\Inbox;
use App\Telegramuser;
use App\User;
use Carbon\Carbon;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class Webhook extends Controller
{
    public function webhook(Request $request)
    {
        
        $post = Telegram::getWebhookUpdates();
        // Telegram::sendMessage([
        //     'chat_id' => '589876870', //adhe
        //     'parse_mode' => 'HTML',
        //     'text' => 'halo'
        // ]);

        $id = $post['message']['from']['id']; //id user dari telegram

        if(isset($post['message']['from']['last_name'])) {
                $nama_kontak = $post['message']['from']['first_name'] .' '. $post['message']['from']['last_name'];
        } else {
            $nama_kontak = $post['message']['from']['first_name'];
        }
        

        $cekId = Telegramuser::find($id);

        if($cekId == null) {
            $newUser = new Telegramuser;
            $newUser->id = $id;
            $newUser->nama_kontak = $nama_kontak;
            $newUser->save();

        } else {
    
            if($cekId->nama_kontak == $nama_kontak) {
                $cekId->nama_kontak = $nama_kontak;
                
            }
        }
        
        $cekId->updated_at = Carbon::now();
        $cekId->save();
        
        $data = new Inbox;
        $data->chat_id      = $post['message']['from']['id'];
        $data->pesan        = $post['message']['text'];
        $data->status       = '0'; // belum terbaca
        $data->from         = '0'; // dari user
        $data->save();
        
        $this->broadcast($cekId->name, $post['message']['text']);
    }
    
    private function broadcast($senderName, $message)
	{
		// $rute = 
		$optionBuilder = new OptionsBuilder();
		$optionBuilder->setTimeToLive(60*20);

		$notificationBuilder = new PayloadNotificationBuilder('Pesan dari :'. $senderName);
		$notificationBuilder->setBody($message)
		->setSound('default')
		->setClickAction('http://localhost:8000/tanya-dokter/1/chat');

		$dataBuilder = new PayloadDataBuilder();
		$dataBuilder->addData([
			'sender_name' => $senderName,
			'message' => $message
		]);

		$option = $optionBuilder->build();
		$notification = $notificationBuilder->build();
		$data = $dataBuilder->build();

// 		// $token = Dokter::all()->pluck('fcm_token')->toArray();
// 		$token = Dokter::all()->pluck('fcm_token')->toArray();
		$token = User::all()->pluck('fcm_token')->toArray();
// 		$mergeToken = array_merge($token, $token2);
		// return $merge;
		$downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

		return $downstreamResponse->numberSuccess();;
	}
}
