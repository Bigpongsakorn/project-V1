<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts'; // ใส่ชื่อตาราง
    protected $primaryKey = 'district_id'; // ใส่ Primary Key

    protected $fillable = [
        'district_name',
        'district_nameen',
    ];
}
