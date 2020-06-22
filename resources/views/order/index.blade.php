@extends('layouts.default')
@section('title', '柯打')

@section('css')
    <style type="text/css">
        .style2 {
            color: #0000CC
        }

        .styleA {
            font-size: xx-large;;
        }
    </style>
@stop

@section('content')
    <div align="center" style="width:995px;height: 80%;" class="row">
        <div class="col-sm-6">
            <!-- <a href="select_day_dept.php?advDays=14"><img src="images/Order_Button_Stock.jpg" width="150" height="150" border="0"></a> -->
            <a href="{{route('selectDay',14)}}"><span class="btn menu-button-big" style="font-size: 40px;line-height: 50px;">中央<br>工場</span></a>
            <br>
            <a href="order_check.php?head=5" class="styleA">翻查柯打</a>
            <br>

        </div>
        <div class="col-sm-6">
            <!-- <a href="#"><img src="images/Order_Button_Supplier.jpg" width="150" height="150" border="0"></a> -->
            <a href="#"><span class="btn menu-button-big" style="font-size: 30px;line-height: 100px;">供應商</span></a>
        </div>
    </div>
@stop

