<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderCheck extends Model
{
    //
    protected $fillable = [
        'item_list', 'report_name', 'num_of_day', 'sort',
        'disabled'
    ];
}
