<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function goodsmenu()
    {
        return $this->belongsTo(GoodsMenu::class, 'product', 'id');
    }

    //
    public static function getDayArray($advDays){
        for ($count = 1 ; $count <= $advDays ; $count ++){
            $dayStr = "特別安排";
            $date = date(strtotime("+".$count." day"));

            $cnWeekday = "";
            $isSunday = false;

            switch(date("D", $date))
            {
                case "Sun":
                    $cnWeekday = "日";
                    $isSunday = true;
                    break;
                case "Mon":
                    $cnWeekday = "一";
                    break;
                case "Tue":
                    $cnWeekday = "二";
                    break;
                case "Wed":
                    $cnWeekday = "三";
                    break;
                case "Thu":
                    $cnWeekday = "四";
                    break;
                case "Fri":
                    $cnWeekday = "五";
                    break;
                default:
                    $cnWeekday = "六";
                    break;
            }

            $date = date('n月d日 ('.$cnWeekday.')', strtotime("+".$count." day"));

            switch($count)
            {
                case 1:
                    $dayStr = "明天";
                    break;
                case 2:
                    $dayStr = "後天";
                    break;
                case 3:
                    $dayStr = "大後天";
                    break;
                case 4:
                    $dayStr = "大大後天";
                    break;
                case 5:
                    $dayStr = "大大大後天";
                    break;
                default:
                    $dayStr = "特別安排";
                    break;
            }
            $tempArray = [];
            $tempArray['date'] =  $date;
            $tempArray['dayStr'] =  $dayStr;
            $dayArray[$count] = $tempArray;

        }

        return $dayArray;
    }
}
