<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Telegram;
use App\Inbox;

class TelegramController extends Controller
{
	public function __construct()
	{
	 
	    $this->middleware('auth');
	}

    public function home()
    {
        // $reply = Telegram::sendMessage([
        //     'chat_id' => '1257678746',
        //     'parse_mode' => 'HTML',
        //     'text' => 'kak cristina yah ?'
        // ]);
        

        // if($reply) {
        //     $data = new Inbox;
        //     $data->chat_id      = '1162401644';
        //     $data->nama_kontak  = 'admin';
        //     $data->pesan        = 'Ah mantap';
        //     $data->status       = '0'; // belum terbaca
        //     $data->from         = '0'; // dari user
        //     $data->save();
        // }
        // // $data = Inbox::where('status', '0')->distinct('nama_kontak')->get();
        // // return $data;
        $data = DB::table('inboxes')
            ->where('status', '0')
            ->select('chat_id', 'nama_kontak', DB::raw('count("pesan") as jmlPesan'))
            // ->whereHas('')
            ->distinct('nama_kontak')
            ->groupBy('chat_id', 'nama_kontak')
            ->orderBy('created_at', 'desc')
            ->get();
        // return $data;
        return view('inbox', ['data' => $data]);
    }

    public function percakapan($id)
    {
        $data = DB::table('inboxes')
            ->where('chat_id', $id)
            ->select('pesan', 'from')
            ->orderBy('created_at', 'asc')
            ->get();
        // return $data;
        return view('inbox', ['data' => $data]);
    }

    public function index(Request $request)
    {
        Telegram::sendMessage([
            'chat_id' => '416439159',
            'parse_mode' => 'HTML',
            'text' => 'Hallo Vendi anjay'
        ]);
 
        // return $request;
    	$activity = Telegram::getWebhookUpdates();
        // return $activity;
    	$col = collect($activity);
        // return 'ja';
        // return $col;
    	return DB::transaction(function() use($col){
    		try{
    			foreach ($col as $col) {
    				$inbox = Inbox::where('update_id', $col->update_id)->where('status', '2')->count();

    				if($inbox < 1) {
    					$inbox = new Inbox;
    					$inbox->update_id = $col['update_id'];
    					$inbox->nama_kontak = $col['message']['from']['first_name'].' '.$col['message']['from']['last_name'];
    					$inbox->status = 2;
    					$inbox->pesan = $col['message']['text'];
    					$inbox->save();
    				}
    			}
    		} catch (Exception $ex) {
    			DB::rollback();
    		}
    	});
    }

   	
}
