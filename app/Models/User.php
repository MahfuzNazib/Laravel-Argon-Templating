<?php

namespace App\Models;

use Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'role_id',
        'image',
        'password',
        'is_active'
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    // Create New User Start
    public static function createNewUser($requestData){
        try{
            $id = static::create($requestData);
            return $id;
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }
    // Create New User End

    // Update User Informations Start
    public static function UpdateUser($requestDate, $id){
        try{
            $user = static::find($id);
            $user->fill($requestDate)->update();
            return $user;
        }catch(\Exception $e){
            throw new \Exception($e->getMessage(), 1); 
        }
    }
    // Update User Informations End 
}
