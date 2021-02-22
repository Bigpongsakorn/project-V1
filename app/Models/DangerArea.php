<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DangerArea extends Model
{
    protected $table = 'area_danger'; // ใส่ชื่อตาราง
    protected $primaryKey = 'area_id'; // ใส่ Primary Key
    public $timestamps = false;
    protected $fillable = [
        'area_name',
        'area_detail',
        'village_id',
        'risk_id',
    ];
}
