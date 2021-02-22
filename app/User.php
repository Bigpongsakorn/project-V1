<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'staffs'; // ใส่ชื่อตาราง
    protected $primaryKey = 'staff_id'; // ใส่ Primary Key

    protected $fillable = [
        'staff_fname', 
        'staff_lname', 
        'staff_email', 
        'username', 
        'password', 
        'staff_type', 
        'staff_tel', 

        'staff_title',
        'staff_status',
        'staff_dob', 
        'staff_position',

        'staff_idcard', 
        'staff_gender',
        'staff_house_no', 
        'staff_village_no', 
        'staff_road', 
        'subdistrict_id', 

        'district', 
        'province', 
        'zip_code', 
        

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // User Type ****

    const ADMIN_TYPE = 1;
    const DEFAULT_TYPE = 2;
    
    public function isAdmin()
    {
        return $this->staff_type === self::ADMIN_TYPE;
    }
}
