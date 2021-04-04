<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class ManageAdmin extends Controller
{
    public function __construct()
	{
	    $this->middleware('auth');
	}
	
	public function index()
    {
        $data = User::get();
    	return view('manage-admin.index', ['data' => $data]);
    }

    public function profile() // halaman profile
	{
		return view('manage-admin.profile');
	}

	public function store(Request $request) // tambah data admin
    {	
    	$validasi = $this->validate($request, [
            'nama' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

    	$data = new User;
    	$data->name 	= $request->nama;
    	$data->email 	= $request->email;
    	$data->password = bcrypt($request->password);
    	$data->save();

    	return $arrayName = array(
    		'status' => 'success',
    		'pesan' => 'Berhasil Menambah Admin. '
    	);
    }
    
    public function update(Request $request) //ubah data admin
	{
		$validasi = $this->validate($request, [
			'nama' => 'required'
		]);

		if($request->password != null) {
			if(strlen($request->password) < 8) {
				return redirect()->back()->with('error', 'Password minimal 8 digit');
			}
			if($request->password != $request->password_confirmation) {
				return redirect()->back()->with('error', 'Password tidak sama');
			}
		}
		


		$id = Auth::user()->id;
    	// return $id;
		$data = User::findOrFail($id);
		$data->name = $request->nama;
		if($request->password != null) {
			$data->password = bcrypt($request->password);
		}

		$data->save();

		if($request->password != null) {
			Auth::logout();

			$request->session()->invalidate();

			$request->session()->regenerateToken();

			return redirect('/login');
		}
        
		return redirect()->back()->with('success', 'Berhasil Mengubah Profile');
	}
}
