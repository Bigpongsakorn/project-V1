<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Risk extends Model
{
    protected $table = 'risks'; // ใส่ชื่อตาราง
    protected $primaryKey = 'risk_id'; // ใส่ Primary Key

    protected $fillable = [
        'risk_name',
        'staff_id',
    ];
}
