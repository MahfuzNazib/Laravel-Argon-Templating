<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(){
        return view('backend.modules.user_management.index');
    }

    // Get All User Data Start
    // public function allUserData(){
    //     if(can('all_user')){
    //         if(auth('super_admin')->check()){
    //             $users = User::orderBy('id', 'desc')->get();
    //         }elseif(auth('web')->check()){
    //             $users = User::orderBy('id', 'desc')->where('id', '!=', auth('web')->user()->id)->get();
    //         }
    //         return DataTables::of($users)
    //         ->rowColumns(['action', 'is_active', 'role', 'info'])
    //         ->editColumn('info', function(User $users){

    //         });
            
    //     }else{

    //     }
    // }
    // Get All User Data End    

    // Add New User
    public function add_modal(){
        $roles = Role::all();
        return view('backend.modules.user_management.modals.create', compact('roles'));
    }

    // Store New User Data Start
    public function add(Request $request){
        if(can('all_user')){
            $validator = Validator::make($request->all(),[
                'name'      => 'required',
                'email'     => 'required|unique:users,email',
                'phone'     => 'required|min:11|max:11',
                'role_id'   => 'required',
                'password'  => 'required|min:6|max:12'
            ]);

            if($validator->fails()){
                return response()->json(['errors' => $validator->errors()],422);
            }else{
                try{
                    $data = $request->all();
                    $data['password'] = Hash::make($request->password); //Make Password Hash

                    $storeUser = User::createNewUser($data);
                    
                    if($storeUser){
                        return response()->json(['success' => 'User Successfully Created'],200);
                    }else{
                        return response()->json(['warning' => 'Something went wrong.Try Next time'],200);
                    }
                }catch(\Exception $e){
                    throw new \Exception($e->getMessage(), 1);
                }
            }

        }else{
            return view('errors.404');
        }
    }
    // Store New User Data End
}
