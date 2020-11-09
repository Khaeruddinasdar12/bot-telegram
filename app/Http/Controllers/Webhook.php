<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;
use App\Inbox;
use App\Telegramuser;

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
                $cekId->save();
            }
        }
        
        $data = new Inbox;
        $data->chat_id      = $post['message']['from']['id'];
        $data->pesan        = $post['message']['text'];
        $data->status       = '0'; // belum terbaca
        $data->from         = '0'; // dari user
        $data->save();
    }
}
