<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $table = 'files_download'; // ใส่ชื่อตาราง
    protected $primaryKey = 'file_id'; // ใส่ Primary Key

    // protected $fillable = [
    //     'file_name'
    // ];
}
