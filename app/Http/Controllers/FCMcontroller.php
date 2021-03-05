<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class FCMcontroller extends Controller
{
    public function index(Request $request)
    {
    	$data = $request->all();
    	$token = $data['token'];
    	$id = $data['user_id'];

    	$user = User::findOrFail($id);
        // if($user->fcm_token == '') {
        //     
        // }
        $user->fcm_token = $token; 
        $user->save();

        return response()->json([
          'status'  => true,
          'message' => 'User token updated successfully'
      ]);
    }
}
