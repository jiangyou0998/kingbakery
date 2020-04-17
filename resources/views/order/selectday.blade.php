@extends('layouts.app')
@section('title', '選擇日期')

@section('content')
    <div align="left"><a href="/order" style="font-size: large">返回</a></div>
    <div class="style5" style="text-align: center;">

        <select style="width:200px;" id="shop">
            <option value="0">請選擇分店</option>

            <option value=""></option>

        </select>

        <input type="radio" name="dept" id="radio" value="R" checked>烘焙
        <input type="radio" name="dept" id="radio" value="B">水吧
        <input type="radio" name="dept" id="radio" value="K">廚房
        <input type="radio" name="dept" id="radio" value="F">樓面



        <table width="100%" border="1" align="center" cellpadding="3" cellspacing="0">
        @foreach($dayArray as $key => $value)
            <tr>
                <td align="right"><strong>{{$value['dayStr']}}</strong></td>
                <td align="left"><a href="javascript:opensupplier({{$key}});"><strong>{{$value['date']}}</strong></a></td>
            </tr>
        @endforeach



        </table>

        <div class="style3" style="font-size: 250%; text-align: center;">不同送貨日
            <span class="style4" style="color: red">必須</span>
            分單</div>
    </div>

@stop

@section('script')
    <script type="text/javascript">
        function opensupplier(aa){
            var Obj = document.getElementsByName("dept");
            var bool = false;
            for (var i = 0; i < Obj.length; i++){
                if(Obj[i].checked==true){
                    bool=true;break;
                }
            }
            var shop = 0;
{{--            @if($_SESSION[type] == 3)--}}
{{--            if((shop = $("#shop").val()) == '0'){--}}
{{--                alert("請先選擇分店");--}}
{{--                return;--}}
{{--            }--}}
{{--            @endif--}}
            if(bool){
                location.href = "/order?shop="+shop+"&dept="+Obj[i].value+"&advance="+aa;
                //this.close();
            }else{
                alert("請先選擇部門");
            }

        }
    </script>
@stop
