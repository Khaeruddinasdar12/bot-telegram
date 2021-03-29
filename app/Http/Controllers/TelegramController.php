<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Telegram;
use App\Inbox;
use App\Telegramuser;
use Carbon\Carbon;
// use TelegramResponseException;
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
        return $data;
    }

    public function balas(Request $request)
    {
        // return $arrayName = array('status' => 'success' , 'pesan' => 'Berhasil mengirim pesan', 'request' => $request );
        $balas = Telegram::sendMessage([
            'chat_id' => $request->id,
            'parse_mode' => 'HTML',
            'text' => $request->pesan
        ]);
        
        $todb = new Inbox;
        $todb->chat_id = $request->id;
        $todb->pesan = $request->pesan;
        $todb->status = '1';
        $todb->from = '1'; // from admin
        $todb->reply_by = \Auth::user()->id;
        $todb->save();  
        
        $updateListUser = Telegramuser::find($request->id);
        $updateListUser->updated_at = Carbon::now();
        $updateListUser->save();
        
        if($balas) {
            return $arrayName = array('status' => 'success' , 'pesan' => 'Berhasil mengirim pesan', 'chat_id' => $request->id);
        } else {
            return $arrayName = array('status' => 'error' , 'pesan' => 'Gagal mengirim pesan' );
        }
        
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
