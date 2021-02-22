<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmergencyForm extends Model
{
    protected $table = 'emergency_form'; // ใส่ชื่อตาราง
    protected $primaryKey = 'ems_id'; // ใส่ Primary Key
}
