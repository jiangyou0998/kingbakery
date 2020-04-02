

<html>
<head>
    <META name="ROBOTS" content="NOINDEX,NOFOLLOW">
        <meta http-equiv="Content-Type" content="text/html; charset=big5" />
        <title>內聯網</title>
        <script src="//cdnjs.cloudflare.com/ajax/libs/json3/3.3.2/json3.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/parser.js"></script>
        <script type='text/javascript' src="js/MultipleSelect/multiple-select.js"></script>
        <script type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>
        <link rel="stylesheet" type="text/css" href="js/MultipleSelect/multiple-select.css">
        <link href="css/checkbox-style.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
            <!--
            .cssTable1 { border-collapse: collapse; border:2px solid black;  position:absolute; left:80px; top:70px;}
            .cssTable1 .cssTableField { width:150px; border: 2px solid black; padding:10px;}
            .cssTable1 .cssTableInput { width:300px; border: 2px solid black; padding:10px;}

            .cssTable2 { border-collapse: collapse; border:2px solid black; position:absolute; left:585px; top:70px; margin-left:10px; background-color:#697CAF; cursor:default;}
            .cssTable2 .cssTableField { width:150px; border: 2px solid black; padding:10px;}
            .cssTable2 .cssTableInput { width:600px; border: 2px solid black; padding:5px; }

            .cssTable3 { border-collapse: collapse; border:2px solid black; position:absolute; left:595px; top:70px; background-color:#697CAF; cursor:default; display:none;}
            .cssTable3 .cssTableInput { width:600px; border: 2px solid black; padding:5px; }

            .brand { text-align:center; cursor:pointer; color:white; background: url("images/2.jpg"); width: 106; height: 35; text-align: center; float:left; padding-top:5px;}
            .brand_all { float:left; text-align:center; cursor:pointer; color:white; background: url("images/3.jpg"); width: 106; height: 35; text-align: center; margin:1px; display:none; padding-top:5px;}
            .shop { float:left; text-align:center; cursor:pointer; color:white; background: url("images/1.jpg"); width: 106; height: 60; text-align: center; margin:1px; display:none; padding-top:5px;}
            .shop_select { background: url("images/6.jpg"); }

            .cat{ text-align:center; cursor:pointer; color:white; background: url("images/2.jpg"); width: 106; height: 35; text-align:center; padding-top:5px;}
            .gp { float:left; text-align:center; cursor:pointer; color:white; background: url("images/3.jpg"); width: 106; height: 35; text-align: center; margin:1px; display:none; padding-top:5px;}
            .item { float:left; text-align:center; cursor:pointer; color:white; background: url("images/1.jpg"); width: 106; height: 65; text-align: center; margin:1px; display:none; padding-top:5px;}
            .item_selected { background: url("images/6.jpg");}


            #item_list { width:100%; }
            .item_list_th { text-align:center; font-weight:bold; }
            .item_list_td { width:150px; }
            .item_list_td_1 { text-align:center; }
            .item_delete {width:25px; text-align:center; }

            .tab1 {position:absolute; left:595px; top:30px; width:100px; height:38px; border: 2px solid black; text-align:center; cursor:pointer; padding:0px;}
            .tab2 {position:absolute; left:697px; top:30px; width:100px; height:38px; border: 2px solid black; text-align:center; cursor:pointer; padding:0px;}
            .active { background-color:yellow; }

            .cssMenu { list-style-type: none; padding: 0; overflow: hidden; background-color: #ECECEC; }
            .cssMenuItem { float: right;  width:140px; border-right: 2px solid white; }
            .cssMenuItem a { display: block; color: black; text-align: center; padding: 4px; text-decoration: none; }
            .cssMenuItem a:hover { background-color: #BBBBBB; color:white; }

            .cssImportant { background-color: #CCFFFF; }

            .ms-drop .container.checkbox-help{
                top: 0px;
                left: 0px;
            }
            .ms-drop span.text{
                margin-left:25px;
            }
            .checkmark{
                height: 18px;
                width: 18px;
            }
            .container .checkmark:after {
                left: 6px;
                top: 1px;
                width: 5px;
                height: 11px;
            }
            .ms-drop ul > li{
                height: 25px;
            }
            .ms-drop ul > li.multiple label{
                height: 25px;
            }
            -->
        </style>



<body>

<div style="width:95%;">

    <div class="tab1 active" >項目</div>
    <!-- <div class="tab2" >分店</div> -->

    <table class="cssTable1">
        <tr>
            <th class="cssTableField cssImportant">報告名稱</th>
            <td class="cssTableInput"><input type="text" id="report_name"></td>
        </tr>
        <tr>
            <th class="cssTableField cssImportant" valign="top">報表 日期</th>
            <td class="cssTableInput">
                星期:
                <select type="text" id="email_week"  style="width:173px;" multiple>
                    <option value="0">星期一</option>
                    <option value="1">星期二</option>
                    <option value="2">星期三</option>
                    <option value="3">星期四</option>
                    <option value="4">星期五</option>
                    <option value="5">星期六</option>
                    <option value="6">星期日</option>
                </select>
                <input type="hidden" id="email_weel_val" value="" />
                <br/>
                時間:
                <input type="text" id="email_time" readonly onclick="WdatePicker(WdatePickerOpt2);" style="width:173px;" value=""/>
            </td>
        </tr>
        <tr>
            <th class="cssTableField cssImportant" valign="top">相隔日數</th>
            <td class="cssTableInput"><input type="text" id="num_of_day" oninput="inputChange(this)" onpropertychange="inputChange(this)" value="1"></td>
        </tr>
        <!--
        <tr>
            <th class="cssTableField cssImportant" valign="top">分開加單</th>
            <td class="cssTableInput">
                <input type="radio" name="separate" value="1" checked id="separate_t">是
                <input type="radio" name="separate" value="0" id="separate_f" style="margin-left:40px">否
            </td>
        </tr>
        <tr>
            <th class="cssTableField cssImportant" valign="top">車牌</th>
            <td class="cssTableInput">
                <input type="radio" name="car" value="1" checked id="car_t">公司車
                <input type="radio" name="car" value="0" id="car_f" style="margin-left:8px">街車
            </td>
        </tr>
        -->
        <tr>
            <th class="cssTableField cssImportant" valign="top">隱藏總數為0的項目</th>
            <td class="cssTableInput">
                <input type="radio" name="hide" value="1" checked id="hide_t">是
                <input type="radio" name="hide" value="0" id="hide_f" style="margin-left:40px">否
            </td>
        </tr>
        <tr>
            <th class="cssTableField cssImportant" valign="top">欄位</th>
            <td class="cssTableInput">
                <input type="radio" name="col" value="1" checked id="main_item">項目
                <input type="radio" name="col" value="0" id="main_shop" style="margin-left:25px">分店
            </td>
        </tr>
        <!--
        <tr>
            <th class="cssTableField cssImportant" valign="top">顯示未確定的項目</th>
            <td class="cssTableInput">
                <input type="radio" name="showNC" value="1" id="showNC_t">是
                <input type="radio" name="showNC" value="0" id="showNC_f" style="margin-left:40px" checked>否
            </td>
        </tr>
        -->
        <tr>
            <th class="cssTableField cssImportant" valign="top">排序</th>
            <td class="cssTableInput"> <input style="width:50px;" id="sort" value="1" oninput="inputChange(this)" onpropertychange="inputChange(this)"></td>
        </tr>
        <!--
        <tr>
            <th class="cssTableField cssImportant" valign="top">分店</th>
            <td class="cssTableInput">
            <div style="height:120px; overflow:scroll; overflow-y:scroll; overflow-x:hidden;" id="shop_message">
            </div>
            </td>
        </tr>
        -->
        <tr>
            <th class="cssTableField cssImportant" valign="top">項目</th>
            <td class="cssTableInput">
                <div style="height:362px; overflow:scroll; overflow-y:scroll; overflow-x:hidden;">
                    <table id="item_list">

                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <!-- <img src="./images/Confirm2.jpg" onclick="console.log(reportInfo());" style="cursor:pointer"> -->
                <img src="./images/Confirm2.jpg" onclick="submit()" style="cursor:pointer">
                <img src="./images/Return.jpg" onclick="document.location='CMS_order_c_check_list.php';" style="cursor:pointer">
            </td>
        </tr>
    </table>

    <table class="cssTable2" >
        <tr style="color:white;">
            <th class="cssTableField">按貨品編號查找</th>
            <td class="cssTableInput" valign="middle" style="width:300px;">
                <div>
                    <input type="text" id="search_no" style="width:150px;" onkeypress='search_code($("#search_no").val(), event);'>
                    <button onclick='search_code($("#search_no").val());'>查找</button>
                </div>
            </td>
        </tr>
        <tr>
            <td class="cssTableInput" valign="top" colspan="2">
                <table>
                    <tr>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="cssTableInput" style="height:200px;" valign="top" colspan="2">

            </td>
        </tr>
        <tr>
            <td class="cssTableInput" valign="top" colspan="2">
                <div style="float:left; height:20px; width:30px; background-color:#00356B"></div>
                <span style="float:left; color:white">可選擇</span>
                <div style="float:left; height:20px; width:30px; margin-left:50px; background-color:#717171"></div>
                <span style="color:white">已選擇</span><br><br>

                <div style="height:369px; overflow:scroll; overflow-y:scroll; overflow-x:hidden;">

                </div>
            </td>
        </tr>
    </table>

    <table class="cssTable3">
        <tr>
            <td class="cssTableInput" style="height:100px;" valign="top">
                <div class="custom">

                </div>
                <div style="float:right; color:white; padding:2px;">
                    <input type="checkbox" id="choose_all" checked />不篩選
                </div>
            </td>
        </tr>
        <tr>
            <td class="cssTableInput" style="height:100px;" valign="top">
                <div class="brand_all" id="brand_all" valign="center" name="">
                    全選
                </div>
                <div class="brand_all" id="brand_all_none" valign="center" name="">
                    全不選
                </div>
            </td>
        </tr>
        <tr>
            <td class="cssTableInput" valign="top">
                <div style="float:left; height:20px; width:30px; background-color:#00356B"></div>
                <span style="float:left; color:white">可選擇</span>
                <div style="float:left; height:20px; width:30px; margin-left:50px; background-color:#717171"></div>
                <span style="color:white">已選擇</span><br><br>

                <div class="custom">
                    <div style="height:461px; overflow:scroll; overflow-y:scroll; overflow-x:hidden;">

                    </div>
                </div>
            </td>
        </tr>
    </table>


</div>

<form action="CMS_order_c_check_save.php" method="POST" id="add_check">
    <input type="hidden" id="type" name="type" value="">
    <input type="hidden" id="action" name="action">
    <input type="hidden" id="report_id" name="report_id">
    <input type="hidden" id="report_info" name="report_info">
</form>
</body>

</html>
