<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    protected $table = 'subdistricts'; // ใส่ชื่อตาราง
    protected $primaryKey = 'subdistrict_id'; // ใส่ Primary Key

    protected $fillable = [
        'zip_code',
        'subdistrict_name',
        'district_nameen',
    ];
}
