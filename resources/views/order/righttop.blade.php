
<html>
<head>
    <META name="ROBOTS" content="NOINDEX,NOFOLLOW">
        <meta http-equiv="Content-Type" content="text/html; charset=big5" />
        <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="js/json2.js" type="text/javascript"></script>
        <title>內聯網</title>
        <style type="text/css">
            <!--
            body {
                margin-bottom: 0px;
            }
            -->
            ul.checked li {
                color:#000;
                text-align:left;
            }
        </style>
        <script>
            function openwindow(aa){
                window.open("show_hide.php?showhide="+aa,"showhide","height=1,width=1,resizable=no,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no, status=no");
            }
            function MM_jumpMenu(targ,selObj,restore){ //v3.0
                eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
                if (restore) selObj.selectedIndex=0;
            }
        </script>
        </head>

<body bgcolor="#697caf" text="#FFFFFF" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">
<table width="100%" height="20px" border="0" cellpadding="0" cellspacing="0">
    <!--
        <tr>
            <td colspan="11">
                <form name="select" id="" method="post">


                <input type="hidden" id="data" name="data" value=''/>

              </form>
            </td>
        </tr>
    -->
</table>
<table border="0" cellpadding="0" cellspacing="2">
    <tr>
        <td width="106" height="38" align="center" background="/images/9.jpg"><a href="/order/rightmiddle?cateid=3" target="middleFrame" >麵包部</a></td>
        <td width="106" height="38" align="center" background="/images/9.jpg"><a href="/order/rightmiddle?cateid=2" target="middleFrame" >西餅部</a></td>
        <td width="106" height="38" align="center" background="/images/9.jpg"><a href="/order/rightmiddle?cateid=1" target="middleFrame" >廚務部</a></td>
        <td width="106" height="38" align="center" background="/images/9.jpg"><a href="/order/rightmiddle?cateid=5" target="middleFrame" >轉手貨</a></td>
    </tr>
</table>

<br/>
<iframe src="/order/rightmiddle" name="middleFrame" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="visibility:inherit; width:100%;z-index:1;height:25%;">

</iframe>
<iframe  name="mainFrame" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="visibility:inherit; width:100%;z-index:1;height:88%;">

</iframe>


<!--
<frameset rows="30%,*" cols="*" frameborder="no" border="1" >

    <frame src="order_z_dept_bottom.php" name="mainFrame" id="mainFrame" title="mainFrame" />
</frameset>
<noframes></noframes>
-->
</body>
</html>
