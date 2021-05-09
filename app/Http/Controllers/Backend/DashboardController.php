<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if( auth('super_admin')->check() || auth('web')->check() ){
            return view('backend.dashboard');
        }else{
            return "Sorry! Access Denied";
        }
    }
}
