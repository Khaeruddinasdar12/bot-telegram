<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Telegram;
use App\Inbox;

class TelegramController extends Controller
{
	// public function __construct()
	// {
	 
	//     $this->middleware('auth');
	// }

    public function index()
    {
    	$activity = Telegram::getUpdates();
    	$col = collect($activity);

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

   	public function home()
   	{
		$data = Inbox::all();
   		return view('inbox', ['data' => $data]);
   	}
}
