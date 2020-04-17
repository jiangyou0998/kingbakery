
<html>
<head>
    <META name="ROBOTS" content="NOINDEX,NOFOLLOW">
        <meta http-equiv="Content-Type" content="text/html; charset=big5" />
        <title>內聯網</title>
        <style type="text/css">
            <!--
            body {
                margin-top: 0px;
                margin-bottom: 0px;
                margin:0px;
            }

            .bgImage{
                background-image:url("/images/1_02.gif");
                width:105px;
                height:35px;
            }
            -->
        </style>
        <script>
            function changeBgImage(list){
                var alinks = document.getElementById("tblist").getElementsByTagName("a");
                for(var i = 0; i<alinks.length;i++){
                    alinks[i].className="";
                }
                list.className = "bgImage";
            }


        </script>
        </head>

<body bgcolor="#697caf" text="#FFFFFF" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">
<table id="tblist" border="0" cellpadding="0" cellspacing="2">
    <tr>
{{--        @if($pagedata['group'] != '')--}}
        @php
            $count = 1;
        @endphp
        @foreach($pagedata['group'] as $key => $value)
            <td width="106" height="38" align="center" background="/images/10.jpg" style="max-height:38px; max-width:106px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr id="tblist">
                        <td align="center"><a  onClick="changeBgImage(this)" href="/order/rightbottom?groupid={{$value['id']}}" target="mainFrame" title="電話:/" >{{$value['group_name']}} </a></td>
                    </tr>
                </table>
            </td>
            @php
                //一行6個
                if($count == 6){echo '</tr><tr>';$count = 0;}
                $count ++;
            @endphp
        @endforeach
{{--        @endif--}}
    </tr>
</table>
</body>
</html>
