<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;
use App\Inbox;

class Webhook extends Controller
{
    public function webhook(Request $request)
    {
        $post = Telegram::getWebhookUpdates();
        
	        if(isset($post['message']['from']['last_name'])) {
	            $nama_kontak = $post['message']['from']['first_name'] .' '. $post['message']['from']['last_name'];
	        } else {
	            $nama_kontak = $post['message']['from']['first_name'];
	        }

        $data = new Inbox;
        $data->chat_id      = $post['message']['from']['id'];
        $data->nama_kontak  = $nama_kontak;
        $data->pesan        = $post['message']['text'];
        $data->status       = '0'; // belum terbaca
        $data->from         = '0'; // dari user
        $data->save();
    }
}
