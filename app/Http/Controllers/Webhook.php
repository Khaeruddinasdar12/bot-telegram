<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;
use App\Inbox;
use App\Telegramuser;
use App\User;
use Carbon\Carbon;
use App\Pengerjaan;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class Webhook extends Controller
{
    public function webhook(Request $request)
    {
        
        $post = Telegram::getWebhookUpdates();
        

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
        
        
        if($post['message']['text'] == '/start') {
            $balas = Telegram::sendMessage([
                'chat_id' => $id,
                'parse_mode' => 'HTML',
                'text' => 'Selamat Datang Di BOT Telegram Aps Seat Managemen UPG'
            ]);
        } else if($post['message']['text'] == '/help') {
            $balas = Telegram::sendMessage([
                'chat_id' => $id,
                'parse_mode' => 'HTML',
                'text' => 'pilih menu atau jenis kerusakan yang telah disedikan oleh pihak APS Seat Manegemen UPG, perhatikan deskripsi masing-masing jenis kerusakan '
            ]);
        } else if($post['message']['text'] == '/komputer' || $post['message']['text'] == '/printer' || $post['message']['text'] == '/ups' || $post['message']['text'] == '/software') {
            $data = new Inbox;
            $data->chat_id      = $post['message']['from']['id'];
            $data->pesan        = $post['message']['text'];
            $data->status       = '0'; // belum terbaca
            $data->from         = '0'; // dari user
            $data->save();
            
            $pengerjaan = new Pengerjaan;
            $pengerjaan->inboxes_id = $data->id;
            $pengerjaan->status = '0';
            $pengerjaan->save();
            
            if($data && $pengerjaan) {
                $balas = Telegram::sendMessage([
                    'chat_id' => $id,
                    'parse_mode' => 'HTML',
                    'text' => 'Akan segera kami periksa, mohon menunggu!'
                ]);
                $cekId->updated_at = Carbon::now();
                $cekId->save();
                $this->broadcast($cekId->name, $post['message']['text']);
            }
        } else {
            $data = new Inbox;
            $data->chat_id      = $post['message']['from']['id'];
            $data->pesan        = $post['message']['text'];
            $data->status       = '0'; // belum terbaca
            $data->from         = '0'; // dari user
            $data->save();
            
            if($data) {
                $cekId->updated_at = Carbon::now();
                $cekId->save();
                $this->broadcast($cekId->name, $post['message']['text']);
            }
        }
        
        
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
