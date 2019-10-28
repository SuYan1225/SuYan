<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>i影资讯</title>
    <link rel='stylesheet' href='../css/actorstyle.css' type="text/css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<div class="topbar">
    <div class="container">
        <div class="topname">
            i&nbsp;影&nbsp;资&nbsp;讯
        </div>
        <div class="topn1">
            最全的影视资讯平台，最真实的影视观后感受，欢迎发帖子互动~
        </div>
        <div class="topinfo">
            <a href="">游客访问</a><span>|</span>
            <a href="magager.php">管理员</a>
        </div>
    </div>
</div>
<div class="fenge">
    <tr></tr>
</div>
<div class="content">
    <div class="search">
        <center>
            <input type="text" name="search" id="search" placeholder="电影名称\导演\演员\帖子" >
            <a href="" id="searcher" name="searcher"  hidefocus="true"><img src="../image/sousuo.jpg" id="sousuo"></a>
        </center>
    </div>
    <div class="content_fenge">
        <tr></tr>
    </div>
    <div class="info">
        <table  cellspacing="0" cellpadding="0" bgcolor="#ffffff" class="w_1200">
            <tr>
                <td width="34">&nbsp;</td>
                <td colspan="3">
                    <span>
                        演员资料：
                    </span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align="left" valign="top" style="padding-top: 30px;">
                    <?php
                    error_reporting(0);
                    session_start();
                    $username = $_SESSION['username'];
                    $actor_id=$_GET['x_actor'];
                    include "conn.php";
                    $path="img_actor/";
                    $sql="select *  from actor where actor_id='{$actor_id}'";
                    $result=mysqli_query($con,$sql);
                    $num = mysqli_num_rows($result);
                    if($num){
                        $arr = array();
                        while($rs = mysqli_fetch_assoc($result)){
                            $arr[]=$rs;
                        }
                    }
                    for($i=0;$i<count($arr);$i++){
                    $actor_name = $arr[$i]['actor_name'];
                    $info=$arr[$i]['info'];
                    $picture=$arr[$i]['picture'];
                    $jingli=$arr[$i]['jingli'];

                    echo " <table  border='0' cellpadding='0' cellspacing='0'style='margin-right: 30px;'>
                        <tr style='margin-right: 20px;'>
                            <td width='300' height=''align='left' valign='middle'>
                                <img  src='".$path.$picture."' id='picture' name='picture'   border='0'>
                            </td>
                            <td  align='left' valign='top'>
                                <table border='0' cellspacing='0'cellpadding='0' style='margin-top: 10px;'>
                                    <tr>
                                        <td  height='50' align='left' style='font-size: 34px;font-family: 一纸情书;color: #FF0099; ' >
                                            ".$actor_name."
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height='48' colspan='2' align='left' style='font-size: 32px;font-weight: bold;font-family: 一纸情书' >
                                            个人简介：
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  style='font-size: 20px;line-height: 30px;'>
                                            ".$info."
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td height='48' colspan='2' align='left' style='font-size: 32px;font-weight: bold;font-family: 一纸情书' >
                                                早年经历：
                            </td>
                        </tr>
                        <tr>
                            <td colspan='2' style='font-size: 22px;line-height: 30px;'>
                                ".$jingli."
                           </td>
                        </tr>
                    </table>";

                    }
                    ?>


                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>





