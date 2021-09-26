<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;
    protected $appends = ['user_role'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'user_status',
        'mobileno',
        'userType',
        'userLoginUserId',
        'userCompany',
        'userCompanyGST',
        'newsletter'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUserRoleAttribute()
    {
        $role = '';
        if($this->status == 0){
            $role = 'Admin';
        } else if($this->status == 1){
            if($this->userType == 1){
                $role = 'Customer';
            } else if($this->userType == 2){
                $role = 'Vendor';
            } else if($this->userType == 3){
                $role = 'Sub Admin';
            }
        }
        return $role;
    }

}
