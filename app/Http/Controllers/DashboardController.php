<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Telegramuser;
use App\Pengerjaan;
class DashboardController extends Controller
{
    public function index()
    {
        $jmlUser = Telegramuser::count();
        $jmlPengerjaan = Pengerjaan::where('status', '0')->count();
        
        return view('dashboard.index', [
            'jmlUser' => $jmlUser,
            'jmlPengerjaan' => $jmlPengerjaan,
        ]);
    }
}
