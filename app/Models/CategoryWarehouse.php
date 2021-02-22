<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryWarehouse extends Model
{
    protected $table = 'category_warehouses'; // ใส่ชื่อตาราง
    protected $primaryKey = 'categoryw_id'; // ใส่ Primary Key

    protected $fillable = [
        'categoryw_name',
        'equip_id'
    ];
}
