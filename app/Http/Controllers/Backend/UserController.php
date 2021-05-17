<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('backend.modules.user_management.index');
    }

    // Add New User
    public function add_modal(){
        return view('backend.modules.user_management.modals.create');
    }
}
