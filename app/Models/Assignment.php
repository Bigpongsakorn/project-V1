<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $table = 'assignment'; // ใส่ชื่อตาราง
    protected $primaryKey = 'assign_id'; // ใส่ Primary Key

    public $timestamps = false;
    
    protected $fillable = [
        'assign_name',
        'assign_detail',
        'staff_id',
        'assign_status',
        'assign_date_start',
        'assign_date_end',
        'work_id',
    ];
    
    
}
