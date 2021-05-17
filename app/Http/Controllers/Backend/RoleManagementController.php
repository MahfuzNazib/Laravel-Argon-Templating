<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleManagementController extends Controller
{
    public function index(){
        return view('backend.modules.role_management.index');
    }
}
