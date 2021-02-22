<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces'; // ใส่ชื่อตาราง
    protected $primaryKey = 'province_id'; // ใส่ Primary Key

    protected $fillable = [
        'province_name',
        'province_nameen',
    ];
}
