
<html>
<head>
    <META name="ROBOTS" content="NOINDEX,NOFOLLOW">
        <meta http-equiv="Content-Type" content="text/html; charset=big5" />
        <title>內聯網</title>
        <style type="text/css">
            input.item {
                font-size: 12px;
            }
            .div {width:100%;height:100%;overflow:auto;overflow-x:hidden;}
            body {
                margin:0;
            }
            .ss { color:blue; }
            .item {color:black !important; }

        </style>
        <script src="/js/jquery.min.js"></script>
        <script>
            function addItem(id){
                console.log(window.frames);

            }
            function dropItem(id){
                alert(id);
            }
            function add(itemid,id,suppName,itemName,uom,base,min,overtime){

                var topWin = window.top.document.getElementById("leftFrame").contentWindow;
                // var qty = 0;
                // var qty2 = topWin.document.$("#qty100001").val();
                //console.log($("#leftFrame").contents());

                var count = $(topWin.document).find(".cart,.cartold").length;
                // count += $(topWin.document).find(".cartold").length;
                // alert(count);

                if (topWin.document.getElementById("qty"+id)){
                    // qty = topWin.document.getElementById(id).style.display='none';
                    var qty = topWin.document.getElementById("qty"+id).value;
                    topWin.document.getElementById("qty"+id).value = parseInt(qty) + base;
                    var qty = parseInt(qty) + base;
                    var maxQty = 300;
                    if(qty > maxQty) {
                        alert("每項目數量最多只可為「" + maxQty + "」");
                        topWin.document.getElementById("qty"+id).value = maxQty;
                    }else if(qty < min){
                        alert("該項目最少落單數量為「"+ min +"」");
                        topWin.document.getElementById("qty"+id).value = min;
                    }else if(qty % base != 0){
                        alert("該項目數量必須以「" + base + "」為單位");
                        var newQty = qty - qty % base;
                        topWin.document.getElementById("qty"+id).value = newQty;
                    };
                }else{
                    var bg = "#F0F0F0";
                    if (count & 1) {
                        bg = "#F0F0F0";
                    } else {
                        bg = "#FFFFFF";
                    }

                    var tr = "<tr bgcolor=\"" + bg + "\" class=\"cart\" id=" + id + " data-itemid=" + itemid + ">\n" +
                        "        <td width=\"10\" align=\"right\">" + (count+1) + ".</td>\n" +
                        "        <td><font color=\"blue\" size=\"-1\">" + suppName + " </font> "+ itemName +",&nbsp;" + id + "</td>\n" +
                        "        <td align=\"center\">\n" ;

                    //超過截單時間
                    if(overtime){
                        tr += "<img src=\"images/alert.gif\" width=\"20\" height=\"20\"> ";
                    }
                    // "        <img src="images/alert.gif" width="20" height="20">        \n" +
                    tr += "\t\t</td>\n" +
                        "        <td width=\"100\" align=\"center\">x \n" +
                        "          <input class=\"qty\" id=\"qty"+ id +"\" name=\"1136\" type=\"text\" value="+min+" data-base="+base+" data-min="+min+" size=\"3\" maxlength=\"4\" autocomplete=\"off\"</td>\n" +
                        "        <td align=\"center\">"+ uom +"</td>\n" +
                        "        <td align=\"center\">\n" +
                        "\t\t\t<a href=\"#\" class=\"delnew\"><font color=\"#FF6600\">X</font></a>\n" +
                        "\t\t</td>\n" +
                        "      </tr>";

                    $(topWin.document).find(".blankline").before(tr);
                    count += 1;

                    // if(count > 0){
                    //     $(topWin.document).find(".cart").eq(count-1).after(tr);
                    //     count += 1;
                    // }else{
                    //
                    //     // alert(count);
                    // }

                }
                // console.log(qty);
            }

            function drop(id,base,min){

                var topWin = window.top.document.getElementById("leftFrame").contentWindow;
                // var qty = 0;
                // var qty2 = topWin.document.$("#qty100001").val();
                //console.log($("#leftFrame").contents());

                // var count = $(topWin.document).find(".cart").length;

                if (topWin.document.getElementById("qty"+id)){
                    // qty = topWin.document.getElementById(id).style.display='none';
                    var qty = topWin.document.getElementById("qty"+id).value;
                    topWin.document.getElementById("qty"+id).value = parseInt(qty) - base;
                    var qty = parseInt(qty) - base;
                    var maxQty = 300;
                    if(qty > maxQty) {
                        alert("每項目數量最多只可為「" + maxQty + "」");
                        topWin.document.getElementById("qty"+id).value = maxQty;
                    }else if(qty < min){
                        alert("該項目最少落單數量為「"+ min +"」");
                        topWin.document.getElementById("qty"+id).value = min;
                    }else if(qty % base != 0){
                        alert("該項目數量必須以「" + base + "」為單位");
                        var newQty = qty - qty % base;
                        topWin.document.getElementById("qty"+id).value = newQty;
                    };
                }
                // console.log(qty);
            }
        </script>
        </head>

<body style="overflow-y:hidden" bgcolor="#697caf" text="#FFFFFF" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF" topmargin="0">
<hr>

<div class="div">
    <form name="orderByFi" action="order_z_dept_left.php" target="leftFrame" method="get">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td height="39"></td>
                <td align="left">&nbsp;

                </td>
                <td width="50" align="center" bgcolor="#FFFF00" style="color:black;">現貨</td>
                <!-- <td width="50" align="center" bgcolor="#D7710D">新貨</td>
                <td width="50" align="center" bgcolor="#008081">季節貨</td>
                -->
                <td width="50" align="center" bgcolor="#7D0101">已截單</td>
                <!--<td width="50" align="center" bgcolor="#666666">暫停</td>-->
            </tr>
        </table>
        <form name="orderByDirect" action="order_z_dept_left.php" target="leftFrame" method="get">
            <br/>
            <br/>
            <input type="hidden" name="action" value="DirectAdd">
            <table border="0" cellpadding="0" cellspacing="5">
                <tr>
                    @php
                        $count = 1;
                    @endphp
                    @foreach($pagedata['menu'] as $key => $value)
                        <td width="150" height="60" align="center" style="background-color:#FFFF00; ">
                            <table width="150px" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td colspan="2" align="center" style="font-size:16px;">
                                        <a id="itm-47" href="#" style="color: black; ">

                                            <table class="item" width="100%" >
                                                <tr>
                                                    <td colspan="4" align="left" style="font-size:12px; color: black; ">
                                                        {{$value->no}}				</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" align="center" style="font-size:16px;">
                                                        <span style="color: black; ">{{$value->itemName}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="height:20px; width:50%; font-size:24px; text-align:center" colspan="2">
                                                        <!-- <a id="itm-47" target="leftFrame" href="order_z_dept_left.php?action=add&productid=47">-->
                                                        <a id="itm-47" href="#" onclick="add('{{$value->itemID}}','{{$value->no}}','{{$value->suppName}}','{{$value->itemName}}','{{$value->UoM}}','{{$value->base}}','{{$value->min}}',)">
                                                            <button type="button" style="height:100%; width:100%; font-size:18px;" >+</button>
                                                        </a>
                                                    </td>
                                                    <td style="height:20px; width:50%; text-align:center" colspan="2">
                                                        <a id="itm-47"  href="#" onclick="drop('{{$value->no}}','{{$value->base}}','{{$value->min}}')" style="color:black;">
                                                            <button type="button" style="height:100%; width:100%; font-size:18px;" >-</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        @php
                            //一行3個
                            if($count == 3){echo '</tr><tr>';$count = 0;}
                            $count ++;
                        @endphp
                    @endforeach


                </tr>

            </table>
</div>
</form>
</body>
</html>

