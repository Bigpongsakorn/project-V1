<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disaster_Report extends Model
{
    protected $table = 'disaster_report_form'; // ใส่ชื่อตาราง
    protected $primaryKey = 'disaster_id'; // ใส่ Primary Key
}
