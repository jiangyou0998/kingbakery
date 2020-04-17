<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsMenu extends Model
{
    //
    protected $fillable = [
        'item_list', 'report_name', 'num_of_day', 'sort',
        'disabled'
    ];

    public function goodsgroup()
    {
        return $this->belongsTo(GoodsGroup::class, 'group_id', 'id');
    }


    public function goodscate()
    {
        return $this->hasOneThrough(GoodsCate::class, GoodsGroup::class,
            'id','id','group_id','cate_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class,'product', 'id');
    }


}
