<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules'; // ใส่ชื่อตาราง
    protected $primaryKey = 'schedule_id'; // ใส่ Primary Key

    protected $fillable = [
        'schedule_name',
        'schedule_detail'
    ];
}
