<html>
<head>
{{--    <META name="ROBOTS" content="NOINDEX,NOFOLLOW">--}}
        <meta http-equiv="Content-Type" content="text/html; charset=big5" />
        <title>內聯網</title>
        <script src="/js/jquery.min.js"></script>
        </head>

<body>
<div align="left"><a target="_top" href="{{route('selectDay',14)}}" >返回</a></div>
<!-- <form action="order_z_dept_2.php?action=confirm&dept=烘焙" method="post" id="cart" name="cart" target="_top">-->
<div align="right"><strong><font color="#FF0000" size="+3">分店：
                </font></strong></div>
<div align="right"><strong><font color="#FF0000" size="+3">部門：<br>送貨日期：</font></strong></div>
<table width="100%" height="89%" border="1" cellpadding="10" cellspacing="2" id="shoppingcart">
    <tr>
        <td valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
                @foreach($order as $key => $value)

                <tr bgcolor="
                        @if(($key + 1) & 1 )
                            #F0F0F0
                        @else
                            #FFFFFF
                        @endif
                    "
                    class="cartold" id="{{$value['no']}}" data-itemid="{{$value['itemID']}}" data-mysqlid="{{$value['orderID']}}">
                    <td width="10" align="right">{{$key+1}}.</td>
                    <td><span style="color: blue; font-size: smaller; ">{{mb_substr($value['cate_name'],0,2)}} </span>{{$value['name']}}, {{$value['no']}}</td>
                    <td align="center">
                        @if($value['haveoutdate'] == 1)
                            <img title='已超過截單時間' src='/images/alert.gif' width='20' height='20'>
                        @endif
                    </td>
                    <td width="100" align="center">x
                        <input class="qty"
                               id="qty{{$value['no']}}"
                               name="{{$value['orderID']}}"
                               type="text" value="{{ round($value['qty'],2) }}"
                               data-base="{{$value['base']}}"
                               data-min="{{$value['min']}}"
                               size="3" maxlength="4"
                               autocomplete="off"
                               @if($value['haveoutdate'] == 1) disabled @endif
                        ></td>
                    <td align="center">{{$value['UoM']}}</td>
                    <td align="center">
                        <a href="#" class="del"><font color="#FF6600">X</font></a>
                    </td>
                </tr>
                @endforeach
                <tr class="blankline">
                    <td colspan="6">&nbsp;</td>
                </tr>
                <tr>
                    <!-- <td colspan="3" valign="middle">分店：蛋撻王(宏啟)<br>柯打日期：2020/4/15<br>柯打合共：13</td> -->
                    <td colspan="6" align="center"><input id="btnsubmit" name="Input" type="image" src="/images/Finish.jpg" border="0" onClick="sss();"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!-- </form>-->
<script>
    $(document).on('change', '.qty', function() {
        var qty = $(this).val();
        var maxQty = 300;
        var base = $(this).data('base');
        var min = $(this).data('min');
        if(qty > maxQty) {
            alert("每項目數量最多只可為「" + maxQty + "」");
            $(this).val(maxQty);
        }else if(qty < min){
            alert("該項目最少落單數量為「"+ min +"」");
            $(this).val(min);
        }else if(qty % base != 0){
            alert("該項目數量必須以「" + base + "」為單位");
            var newQty = qty - qty % base;
            $(this).val(newQty);
        };
    });

    //刪除(x按鈕),隱藏相應行,原本已經存在的
    $(document).on('click', '.del', function() {
        var parent = $(this).parents(".cartold");
        var parentClass = parent.attr("class");
        parent.removeClass(parentClass).addClass("cartdel");
        parent.hide();
        // console.log(parent.attr("class"));

    });

    //刪除(x按鈕),隱藏相應行,新增的行
    $(document).on('click', '.delnew', function() {
        var parent = $(this).parents(".cart");
        var parentClass = parent.attr("class");
        parent.removeClass(parentClass).addClass("cartdelnew");
        parent.hide();
        // console.log(parent.attr("class"));

    });

    //點擊完成按鈕提交修改
    function sss(){
        //禁止按鈕重複點擊
        $("#btnsubmit").attr('disabled',true);
        var insertarray = [];
        //insert
        $(".cart").each(function() {

            var id = $(this).attr('id');

            var itemid = $(this).data('itemid');
            // console.log($id);

            var qty = $("#qty"+id).val();
            // console.log($qty);

            var item = {'itemid':itemid, 'qty':qty};
            insertarray.push(item);

        });

        var updatearray = [];
        //insert
        $(".cartold").each(function() {

            var id = $(this).attr('id');

            var mysqlID = $(this).data('mysqlid');

            var itemid = $(this).data('itemid');
            // console.log($id);

            var qty = $("#qty"+id).val();
            // console.log($qty);

            var item = {'mysqlid':mysqlID, 'qty':qty};
            updatearray.push(item);

        });

        var delarray = [];
        //insert
        $(".cartdel").each(function() {

            var mysqlID = $(this).data('mysqlid');

            var item = {'mysqlid':mysqlID};
            delarray.push(item);

        });
        // console.log(JSON.stringify(insertarray));

        $.ajax({
            type: "POST",
            url: "order_z_dept_insert.php",
            data: {
                'insertData':JSON.stringify(insertarray),
                'updateData':JSON.stringify(updatearray),
                'delData':JSON.stringify(delarray)
            },
            success: function(msg){
                alert('已落貨!\n您將會收到電郵確認');
                window.location.reload();
                // console.log(msg);
            }
        });

    }
</script>



</body>
</html>
