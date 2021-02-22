<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow_bk extends Model
{
    protected $table = 'borrow_bks'; // ใส่ชื่อตาราง
    protected $primaryKey = 'borrow_id'; // ใส่ Primary Key

    protected $fillable = [
        'borrow_detail',
        'borrow_amount',
        'equip_id',
        'staff_id',
        'borrow_date',
        // 'return_date',
        // 'borrow_status',
    ];
}
