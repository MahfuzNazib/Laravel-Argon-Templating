<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use Exception;
use Yajra\DataTables\Facades\DataTables;

class RoleManagementController extends Controller
{
    public function index(){
        return view('backend.modules.role_management.index');
    }

    // Geeting All Role Data Start
    public function data(){
        if( can('roles') ){
            $role = Role::orderBy('id', 'desc')->get();
            return DataTables::of($role)
            ->rawColumns(['action', 'is_active','permission'])
            ->editColumn('is_active', function (Role $role) {
                if ($role->is_active == true) {
                    return '<p class="badge badge-success">Active</p>';
                } else {
                    return '<p class="badge badge-danger">Inactive</p>';
                }
            })
            ->editColumn('permission', function (Role $role) {
                $data = [];
                foreach( $role->permission as $permission ){
                    array_push($data, $permission->display_name);
                }
                return $data;
            })
            ->addColumn('action', function (Role $role) {
                return '
                    <a data-toggle="modal" data-content="'. route('role.edit',$role->id) .'"  href="#modal1" >
                        <button class="btn btn-info btn-sm">Edit</button>
                    </a>
                ';
            })
            ->make(true);
        }else{
            return view("errors.404");
        }
    }
    // Getting All Role Data End

    // Add New Role Modal Start
    public function add_modal(){
        return view('backend.modules.role_management.modals.create');
    }
    // Add New Role Modal End

    // Insert Role Info Start
    public function add(Request $request){
        if( can('roles') ){
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
        }else{
            return view("errors.404");
        }
    }
    // Insert Role Info End
}
