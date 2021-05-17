<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use Exception;

class RoleManagementController extends Controller
{
    public function index(){
        return view('backend.modules.role_management.index');
    }

    // Add New Role Modal
    public function add_modal(){
        return view('backend.modules.role_management.modals.create');
    }

    public function add(Request $request){
        // if( can('roles') ){
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:roles,name',
                'permission.*' => 'required',
            ]);
    
            if( $validator->fails() ){
                return response()->json(['errors' => $validator->errors()], 422);
            }else{
                try{
                    $role = new Role();
                    $role->name = $request->name;
                    $role->is_active = true;
                    if( $role->save() ){
                        foreach( $request['permission'] as $permission ){
                            $role->permission()->attach($permission);
                        }
                        return response()->json(['success' => 'New Role Added Successfully'], 200);
                    }
                }
                catch(Exception $e){
                    return response()->json(['error' => $e->getMessage()], 200);
                }
            }
        // }else{
        //     return view("errors.404");
        // }
        
    }
}
