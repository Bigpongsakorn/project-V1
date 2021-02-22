<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table = 'leave'; // ใส่ชื่อตาราง
    protected $primaryKey = 'leave_id'; // ใส่ Primary Key

    protected $fillable = [
        'leave_name',
        'leave_detail',
        'leave_type',
        'user_id',
        'leave_date_start',
        'leave_date_end',
        'leave_status',
    ];
}
