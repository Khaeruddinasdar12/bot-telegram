<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Telegram;
use App\Inbox;
use App\Telegramuser;

class TelegramController extends Controller
{
	public function __construct()
	{
	 
	    $this->middleware('auth');
	}

    public function home()
    {
        $data = Inbox::where('status', '0')
            ->select('chat_id', DB::raw('count("pesan") as jmlPesan'))
            ->with('telegramuser:id,nama_kontak')
            ->distinct('chat_id')
            ->groupBy('chat_id')
            ->orderBy('created_at', 'desc')
            ->get();
        // return $data;
        return view('inbox', ['data' => $data]);
    }

    public function percakapan($id)
    {
        $data = Telegramuser::
                select('id', 'nama_kontak')
                ->with('chat:chat_id,pesan,from,status,created_at')
                ->where('id', $id)
                ->get();

        // $data = Inbox::where('chat_id', $id)
        //     ->select('chat_id', 'pesan', 'from')
        //     ->with('telegramuser:id,nama_kontak')
        //     ->orderBy('created_at', 'asc')
        //     ->get();
        return $data;
        // return view('inbox', ['data' => $data]);
    }

    public function index(Request $request)
    {
        Telegram::sendMessage([
            'chat_id' => '416439159',
            'parse_mode' => 'HTML',
            'text' => 'Hallo Vendi anjay'
        ]);
 
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
