<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sufferer extends Model
{
    protected $table = 'sufferer_request_form'; // ใส่ชื่อตาราง
    protected $primaryKey = 'sufferer_id'; // ใส่ Primary Key
    public $timestamps = false;
}
