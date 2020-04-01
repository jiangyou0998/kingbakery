<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    //
    protected $fillable = [
        'name', 'dept', 'filepath', 'user',
        'date_create', 'date_modify', 'date_delete', 'notice_no',
        'date_until', 'first_path'
    ];
}
