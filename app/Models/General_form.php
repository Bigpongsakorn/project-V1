<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class General_form extends Model
{
    protected $table = 'general_form'; // ใส่ชื่อตาราง
    protected $primaryKey = 'general_id'; // ใส่ Primary Key
    public $timestamps = false;
    // protected $fillable = [
    //     'general_title',
    //     'general_detail',
    //     'general_tel',
    //     'write_at',
    //     'mention',
    //     'user_name',
    //     'age',
    //     'home_num',
    //     'moo',
    //     'moo_num',
    //     'road',
    //     'province',
    //     'district',
    //     'sub_district',
    //     'tel',
    //     'wish',
    //     'sign',
    //     'position',
    // ];
}
