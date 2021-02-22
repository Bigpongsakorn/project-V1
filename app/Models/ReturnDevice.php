<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnDevice extends Model
{
    protected $table = 'return'; // ใส่ชื่อตาราง
    protected $primaryKey = 'return_id'; // ใส่ Primary Key

    protected $fillable = [
        'return_date',
        'return_amount',
        'equip_id',
        'staff_id',
        'return_detail',
    ];
}
