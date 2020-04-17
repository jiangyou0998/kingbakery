<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsGroup extends Model
{
    //

    // 與goods_menu表關聯
    public function goodsmenu()
    {
        return $this->hasMany(GoodsMenu::class);
    }

    public function goodscate()
    {
        return $this->belongsTo(GoodsCate::class, 'cate_id', 'id');
    }
}
