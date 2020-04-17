<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsCate extends Model
{
    //
    // 與goods_groups表關聯
    public function goodsgroups()
    {
        return $this->hasMany(GoodsGroup::class);
    }

    public function goodsmenu()
    {
        return $this->hasManyThrough(GoodsMenu::class, GoodsGroup::class,
            'id','id','group_id','cate_id');
    }

//    private function getCateName()
//    {
//        return self::all()->select('cate_name')->first;
//    }

//    public static function getCateName()
//    {
//        $bannerTable = DB::connection('mysql_read')->table('goods_cates')->where('cate_name', $merchantid);
//
//        $banners = $bannerTable->get();
//
//        return $banners;
//    }

}
