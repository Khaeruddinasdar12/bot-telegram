<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Telegramuser;
class UserController extends Controller
{
    public function __construct()
	{
	 
	    $this->middleware('auth');
	}
	
	public function index()
	{
	    $data = Telegramuser::get();
	    
	    return view('user.index', ['data' => $data]);
	}
}
