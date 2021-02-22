<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'equipments'; // ใส่ชื่อตาราง
    protected $primaryKey = 'equip_id'; // ใส่ Primary Key

    protected $fillable = [
        'equip_name',
        'equip_price',
        'equip_amount',
        'staff_id',
        'equip_unit',
        'equip_type',
        'equip_date',
        'equip_fix',
    ];
}
