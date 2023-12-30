<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table ='users'; 
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function bills(){
        return $this->hasMany(Bill::class);
    }
    public function permissions()
    {
        return ['admin.dashboard'];
    }
    public function hasPermission($route){
        $list_route = $this->routes();
        if(in_array($route,$list_route)){
            return true;
        }
        return false;
        //return true;
    }
    // cac permission da duoc gan cho ng dung 
    public function routes() {

        $data = [];
        foreach($this->getRoles as $role ){
            $permissions = json_decode($role->permissions);
            foreach ($permissions as $per) {
                # code...
                if(!in_array($per,$data)){
                    array_push($data, $per);
                }
            }
        }
        return $data;
    }
    public function getRoles(){
        return $this->belongsToMany(Role::class,'user_roles','user_id', 'role_id');
    }
}
