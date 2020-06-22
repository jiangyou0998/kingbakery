@extends('layouts.default')
@section('title', '首頁')

@section('css')
    <link href="css/class.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/gallery.css" rel="stylesheet">
    <style type="text/css">
        <!--
        .style2 {
            color: #0000CC
        }

        .history {
            font-size: 12px;
        }

        .gallery {
            border: 0px solid black;
            height: 100px;
            padding: 4px;
        }

        .gallery > img {
            width: 100%;
            height: 100%;
        }

        -->
    </style>
@stop

@section('content')
    <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <table id="Table_01" width="995" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr>
            <td colspan="13">
                <script>
                    function redirectPage(redirPage) {
//		alert('hello');
                        if (redirPage == 'order.php?head=5')
                            parent.location.href = redirPage
                    }

                    function ImgOver(op, num) {
                        op.src = "images/Header_d_" + num + ".jpg";
                    }

                    function ImgOut(op, num) {
                        op.src = "images/Header_" + num + ".jpg";
                    }

                    function ImgOver_a(op, num) {
                        op.src = "images/Head_d_" + num + ".jpg";
                    }

                    function ImgOut_a(op, num) {
                        op.src = "images/Head_" + num + ".jpg";
                    }
                </script>


            </td>
            <td>&nbsp;</td>
        </tr>
        </tbody>
    </table>

    <div class="row" style="width:995px; padding-left:20px;">
        <div class="col-sm-4" height="210"
             style="border:1px solid black; padding-left:20px; height:210px; background:#FFCC66;">
            <br>
            @include('pages._login')
        </div>

        <div class="col-sm-8" style="border:1px solid black; display:inline-block; height:210px; padding:8px;">
            <b>廣告</b>
            <br\>
            <!--<iframe width="240" height="160" src="https://192.168.0.40/photo/webapi/embed.php?id=video_4b696e672042616b6572792f32303230e89b8be692bbe78e8b3238e980b1e5b9b4e881afe6ada1e6999ae5aeb4_32303230204b696e6742616b65727920566964656f2e6d7034&quality=orig_h264" frameborder="0" allowfullscreen></iframe>-->
            <img src="images/newyear.jpg" width="500" height="190" border="0">
            </br\>
        </div>
    </div>
    <br>
    <div class="row" style="width:995px; padding-left:20px; height:600px;">
        <div class="col-sm-4"
             style="border:1px solid black; display:inline-block; height:100%; padding:8px; background:#FBEEE8;">
            <b>最新通告</b>
            <br>
            <br>
            <div class="row" style="padding:4px; 0px;">
                <div class="col-sm-8"><a href="notice.php">KBHL-MKT-2...</a></div>
                <div class="col-sm-4">-市場推廣部</div>
            </div>
            <div class="row" style="padding:4px; 0px;">
                <div class="col-sm-8"><a href="notice.php">KBHL-MKT-2...</a></div>
                <div class="col-sm-4">-市場推廣部</div>
            </div>
            <div class="row" style="padding:4px; 0px;">
                <div class="col-sm-8"><a href="notice.php">2020年端午節通告</a></div>
                <div class="col-sm-4">-董事總經理辦公室</div>
            </div>
            <div class="row" style="padding:4px; 0px;">
                <div class="col-sm-8"><a href="notice.php">(重發)KBHR-1...</a></div>
                <div class="col-sm-4">-人力資源部</div>
            </div>
            <div class="row" style="padding:4px; 0px;">
                <div class="col-sm-8"><a href="notice.php">CHR-200601...</a></div>
                <div class="col-sm-4">-人力資源部</div>
            </div>
            <div class="row" style="padding:4px; 0px;">
                <div class="col-sm-8"><a href="notice.php">(重發)RYHR-M...</a></div>
                <div class="col-sm-4">-人力資源部</div>
            </div>
            <div class="row" style="padding:4px; 0px;">
                <div class="col-sm-8"><a href="notice.php">KBHL-MKT-2...</a></div>
                <div class="col-sm-4">-市場推廣部</div>
            </div>
            <div class="row" style="padding:4px; 0px;">
                <div class="col-sm-8"><a href="notice.php">KBHL-MKT-2...</a></div>
                <div class="col-sm-4">-市場推廣部</div>
            </div>
            <div class="row" style="padding:4px; 0px;">
                <div class="col-sm-8"><a href="notice.php">RYHR-20060...</a></div>
                <div class="col-sm-4">-人力資源部</div>
            </div>
            <div class="row" style="padding:4px; 0px;">
                <div class="col-sm-8"><a href="notice.php">RBHR-20060...</a></div>
                <div class="col-sm-4">-人力資源部</div>
            </div>
            <div class="row" style="padding:4px; 0px;">
                <div class="col-sm-8"><a href="notice.php">KBHR-20060...</a></div>
                <div class="col-sm-4">-人力資源部</div>
            </div>
            <div class="row" style="padding:4px; 0px;">
                <div class="col-sm-8"><a href="notice.php">KBHL-MKT-2...</a></div>
                <div class="col-sm-4">-市場推廣部</div>
            </div>
            <div class="row" style="padding-top:24px; padding-right:8px;">
                <div class="col-sm-12" align="right">
                    <a href="notice.php">更多...</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4" style="border:1px solid black; display:inline-block; height:100%; padding:8px;">
            <b>相薄</b>
            <br>
            <br>
            <div>
                <a href="http://192.168.0.40/photo/?t=Albums/album_4b696e672042616b657279/video_4b696e672042616b657279_e6a99fe5a0b4e9a3b2e9a39fe694bbe795a52e6d7034#Albums/album_4b696e672042616b657279/video_4b696e672042616b657279_e6a99fe5a0b4e9a3b2e9a39fe694bbe795a52e6d7034">J2
                    - 機場飲食攻略</a></div>
            <iframe width="300" height="240"
                    src="http://192.168.0.40/photo/webapi/embed.php?id=video_4b696e672042616b657279_e6a99fe5a0b4e9a3b2e9a39fe694bbe795a52e6d7034&amp;quality=orig_h264"
                    frameborder="0" allowfullscreen=""></iframe>
            <div>
                <a href="http://192.168.0.40/photo/?t=Albums/album_4b696e672042616b657279/album_4b696e672042616b6572792f32303230e89b8be692bbe78e8b3238e980b1e5b9b4e881afe6ada1e6999ae5aeb4#Albums/album_4b696e672042616b657279/album_4b696e672042616b6572792f32303230e89b8be692bbe78e8b3238e980b1e5b9b4e881afe6ada1e6999ae5aeb4">2020蛋撻王28週年聯歡晚宴</a>
            </div>
            <iframe width="300" height="240" frameborder="0"
                    src="http://192.168.0.40/photo/embed/embed.html?album=album_4b696e672042616b6572792f32303230e89b8be692bbe78e8b3238e980b1e5b9b4e881afe6ada1e6999ae5aeb4&amp;openps=1&amp;autoplay=1&amp;lightbox=1"
                    photostation=""></iframe>
            <br>

        </div>
        <div class="col-sm-4" style="border:1px solid black; display:inline-block; height:100%; padding:8px;"><b>歷史</b>
            <div class="history">
                <br>
                蛋撻王控股有限公司成立於1993年初，由集團董事局主席莊任明先生創立。
                <br>
                <br>
                經營規模<br>
                本集團以經營快餐、飯堂、茶餐廳、零售各類蛋撻、麵飽及西餅等業務為主，目前本集團在香港擁有21間分店，新加坡及馬來西亞擁有共16間，近年本集團在營運及行政管理方面更漸趨企業化。於2000年獲選為香港房屋署名店冊成員，名店行業包括快餐店、酒樓、茶餐廳及麵包西餅，及在2002年成功得到香港政府註冊商標。公司十分重視食物品質的監控，明瞭這環節對食肆來說是佔著主導地位的，故必須要有強勢的領導班底，有見及此，公司組織了一隊精英管理層，制定措施。憑藉嚴謹的品質管理，精確的行政措施，以顧客為先之服務精神。令本公司的產品深受各界歡迎，備受好評，成績斐然。
                <br>
                <br>
                現代化工場運作<br>
                本集團在2005年，斥資購置逾萬呎廠房及全新現代化設備，為未來發展作好充分準備。生產線主要引入先進機械化設備，生產區員工運作必須按照管理層訂下的工作指引，將貨品先入先出，分類整齊擺放，整體衛生潔淨，令食物的品質更有所提高，中央工場並已考取五常法及HCS衛生監控認証。
                現時中央工場使用SGS5S 及HCS 作管理基礎, 令食物品質更有所提高本集團為求將企業管理現代化, 於05年引入五常法(5s)管理模式作依據。使製作工場及全線分店的管理更規範化, 公司運作更有條理。
                在工場運作暢順的同時，增設營運部及產品開發部，為提升集團營運管理效率，品質監控並本著不斷創新的精神，開發更新款式的出品，以增強市場競爭力。
                制作工場及全線分店的管理更規範化，公司運作更有條理。並針對每款食物的份量及制作，繕制了制作份量表及制作流程守則，對監控出品的質素，使之符合及維持既定的標準。
                <br>
            </div>
        </div>
    </div>
    <br>
    <br>
    @stop

    @section('script')
        <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="js/gallery.js" type="text/javascript"></script>
@stop




