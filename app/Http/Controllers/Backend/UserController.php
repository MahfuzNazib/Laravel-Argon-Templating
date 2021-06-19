<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(){
        return view('backend.modules.user_management.index');
    }

    // Get All User Data Start
    public function allUserData(){
        if(can('all_user')){
            if(auth('super_admin')->check()){
                $users = User::orderBy('id', 'desc')->get();
            }elseif(auth('web')->check()){
                $users = User::orderBy('id', 'desc')->where('id', '!=', auth('web')->user()->id)->get();
            }
            return DataTables::of($users)
            ->rawColumns(['profile_picture','role', 'is_active', 'action'])
            ->editColumn('role', function(User $users){
                return $users->role->name;
            })
            ->editColumn('profile_picture', function(User $users){
                if($users->image == null){
                    $profile = asset("argon/img/profile_picture/d_pp.png");
                }else{
                    $profile = asset('argon/img/profile_picture/'.$users->image);
                }
                return "<center>
                            <img src='$profile' width='100px' class='rounded'>
                        </center>";
            })
            
            ->editColumn('is_active', function(User $users){
                if($users->is_active == true){
                    return '<span class="badge badge-success">Active</span>';
                }else{
                    return '<span class="badge badge-danger">Inactive</span>';
                }
            })

            ->addColumn('action', function(User $users){
                return '<a class="waves-effect waves-light btn btn-sm btn-info modal-trigger"
                           data-toggle="modal" data-content="{{ route("user.add.modal") }}"  href="#modal1">
                            View
                        </a>

                        <a data-toggle="modal" data-content="'. route('user.edit',$users->id) .'"  href="#modal1" >
                            <button class="btn btn-success btn-sm">Edit</button>
                        </a>
                        ';
            })
            ->make(true);
            
        }else{
            return view('errors.404');
        }
    }
    // Get All User Data End    

    // Add New User
    public function add_modal(){
        $roles = Role::where('is_active', 1)->get();
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

                    // Image Processing Start
                    if($request->hasFile('image')){
                        $file = $request->file('image');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time(). '.' .$extension;
                        
                        $file->move('argon/img/profile_picture/',$filename);
                        $data['image'] = $filename;
            
                    }else{
                        $data['image'] = null;
                    }
                    // Image Processing End

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

    // Edit User Start
    public function edit($id){
        if(can('all_user')){
            $user = User::find($id);
            $roles = Role::select('id','name')->where('is_active', 1)->get();
            return view('backend.modules.user_management.modals.edit', compact('user', 'roles'));
        }else{
            return view('errors.404');
        }
    }
    // Edit User End

    // Update User Start
    public function update(Request $request, $id){
        if(can('all_user')){
            $validator = Validator::make($request->all(), [
                'role_id' => 'required',
                'name'    => 'required',
                'phone'   => 'required|min:11|max:11',
                'is_active' => 'required',
                'email'   => 'required'
            ]);

            if($validator->fails()){
                return response()->json(['errors' => $validator->errors()] ,422);
            }else{
                try{
                    $data = $request->all();
                    $updateUser = User::UpdateUser($data, $id);
                    if($updateUser){
                        return response()->json(['success' => 'User Successfully Updated'],200);
                    }
                }catch(Exception $e){
                    return response()->json(['error' => $e->getMessage()],200);
                }
            }
        }else{
            return view('errors.404');
        }
    }
    // Update User End
}
