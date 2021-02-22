<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $table = 'operation'; // ใส่ชื่อตาราง
    protected $primaryKey = 'operation_id'; // ใส่ Primary Key

    public $timestamps = false;
}
