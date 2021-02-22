<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table = 'borrows'; // ใส่ชื่อตาราง
    protected $primaryKey = 'borrow_id'; // ใส่ Primary Key

    protected $fillable = [
        'borrow_detail',
        'borrow_amount',
        'equip_id',
        'staff_id',
        'borrow_date',
        'return_date',
        'borrow_status',
    ];
}
