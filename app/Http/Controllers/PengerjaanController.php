<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengerjaan;
class PengerjaanController extends Controller
{
    public function __construct()
	{
	    $this->middleware('auth');
	}
	
	public function index() //pengerjaan sedang berlangsung
	{
	    $data = Pengerjaan::where('status', '0')
	    ->with('chat.telegramuser:id,nama_kontak')
	    ->orderBy('created_at', 'desc')
	    ->get();
	    return view('pengerjaan.index', ['data' => $data]);
	    
	}
	
	public function riwayat() //riwayat pengerjaan 
	{
	    $data = Pengerjaan::where('status', '1')
	    ->with('chat.telegramuser:id,nama_kontak')
	    ->orderBy('created_at', 'desc')
	    ->get();
	    return view('pengerjaan.riwayat', ['data' => $data]);
	}
	
	public function konfirmasi(Request $request) //konfirmasi pengerjaan (menuju riwayat) 
	{
	    $data = Pengerjaan::findOrFail($request->pengerjaan_id);
	    $data->status = '1';
	    $data->save();
	    return $arrayName = array(
    		'status' => 'success',
    		'pesan' => 'Pengerjaan dikonfirmasi selesai. '
    	);
	}
	
	public function keterangan(Request $request) //tambah keterangan 
	{
	    $data = Pengerjaan::findOrFail($request->pengerjaan_id);
	    $data->keterangan = $request->keterangan;
	    $data->save();
	    return $arrayName = array(
    		'status' => 'success',
    		'pesan' => 'Keterangan ditambahkan. '
    	);
	}
}
