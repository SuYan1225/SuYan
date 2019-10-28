<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>i影资讯</title>
    <link rel='stylesheet' href='../css/main.css' type="text/css">
    <link rel="stylesheet" href="../css/xiangxistyle.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../js/deletejs.js"></script>
</head>
<div class="topbar">
    <div class="container">
        <div class="topname">
            i&nbsp;影&nbsp;资&nbsp;讯
        </div>
        <div class="topn1">
            最全的影视资讯平台，最真实的影视观后感受，欢迎发帖子互动~
        </div>
        <div class="topinfo">
            <?php
            error_reporting(0);
            session_start();
            include "conn.php";
            $pa="touxiang/";
            if(isset($_SESSION['username'])) {
                //显示头像
                $sql="select touxiang from user where user_name='{$_SESSION['username']}'";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_array($result);
                foreach ($row as $value){
                    $touxiang=$row[0];
                }
                echo "<div style='float:left'>";
                echo "<img src='".$pa.$touxiang."' class='touxiang' style='border-radius:50%;width:30px;height:30px;'/>&nbsp;&nbsp;";
                echo $_SESSION['username'];
                echo "</div>";
            }
            ?>
            <span>|</span>
            <a href="home.php">首页</a>
            <span>|</span>
            <a href="posts.php">讨论帖</a>
            <span>|</span>
            <a href="personal.php">个人资料</a>
            <span>|</span>
            <a href="denglu.php">退出</a>
        </div>
    </div>
</div>
<div class="fenge">
    <tr></tr>
</div>
<div class="content">
    <div class="search">
        <center>
            <form action="search.php" method="post">
                <input type="text" name="content" id="search" placeholder="电影名称\导演\演员\题材" >
                <input type="submit" name="submit" id="sousuo" value="搜索">
            </form>
        </center>
        <br>
    </div>
    <div class="content_fenge">
        <tr></tr>
    </div>
    <div class="info" style="margin-right: 35px;">
        <table  cellspacing="0" cellpadding="0" bgcolor="#ffffff" class="w_1200">
            <tr>
                <td width="34">&nbsp;</td>
                <td colspan="3">
                    <span>
                        电影详情
                    </span>
                </td>
            </tr>
            <tr>
                <td width="34"></td>
                <td colspan="2" height="1" bgcolor="#e5e5e5"></td>
            </tr>
            <tr>
                <td></td>
                <td align="left" valign="top" style="padding-top: 30px;">
                    <?php
                    error_reporting(0);
                    session_start();
                    $username = $_SESSION['username'];
                    $film=$_GET['film'];
                    $current_film_id=$film;
                    include "conn.php";
                    $film_sql="select * from film_info where film_id='{$film}'";
                    $film_result=mysqli_query($con,$film_sql);
                    $film_num=mysqli_num_rows($film_result);
                    if($film_num){
                        $film_arr=array();
                        while ($f_rs=mysqli_fetch_assoc($film_result)){
                            $film_arr[]=$f_rs;
                        }
                    }
                    for($i=0;$i<count($film_arr);$i++) {
                        $f_id = $film_arr[$i]['film_id'];
                        $f_name = $film_arr[$i]['film_name'];
                        $p = $film_arr[$i]['picture'];
                        $info = $film_arr[$i]['info'];
                        $f_date = $film_arr[$i]['film_date'];
                        $director_id=$film_arr[$i]['director_id'];
                        $path = "img/";
                    }
             echo "<table  border='0' cellpadding='0' cellspacing='0'>
                        <tr>
                            <td width='300' height='' align='left' valign='middle'>";
                                echo "<img  src=" .$path.$p." id='picture' name='picture'  alt='' border='0' >";
                    echo   "</td>
                            <td  align='left' valign='top'>
                                <table border='0' cellspacing='0'cellpadding='0' style='margin-top: 10px;'>
                                    <tr>
                                        <td align='left' colspan='2' height='60' id='t' style='font-size: 35px;font-weight: bold;font-family: 一纸情书'>".$f_name."</td>
                                    </tr>";
                             echo "<tr>
                                        <td width='150' height='50' align='left' style='font-size: 30px;font-family: 一纸情书'>
                                            演&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;员：
                                        </td>";
                    $act="SELECT DISTINCT * from actor LEFT JOIN film_actor on actor.actor_id=film_actor.actor_id where film_id='{$film}'";
                    $actor_result=mysqli_query($con,$act);
                    $actor_num=mysqli_num_rows($actor_result);
                    if($actor_num){
                        $actor_arr=array();
                        while ($a_rs=mysqli_fetch_assoc($actor_result)){
                            $actor_arr[]=$a_rs;
                        }
                    }
                    for($j=0;$j<count($actor_arr);$j++){
                        $a_id=$actor_arr[$j]['actor_id'];
                        $a_name=$actor_arr[$j]['actor_name'];
                                echo    "<td>
                                            <a href='actor.php?x_actor=".$a_id."' style='font-size: 26px;font-family: 一纸情书'>".$a_name."&nbsp;&nbsp;&nbsp;</a>
                                        </td>";
                                        }
                               echo " </tr>";
                        $dir_sql="select * from director where director_id='{$director_id}'";
                        $dir_restult=mysqli_query($con,$dir_sql);
                        $dir_row=mysqli_fetch_array($dir_restult);
                        foreach ($dir_row as $va){
                            $director_name= $va;
                        }
                    echo "<tr>
                                <td height='50' align='left' style='font-size: 30px;font-family: 一纸情书'>导&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;演：</td>
                                <td style='font-size: 26px;font-family: 一纸情书'>".$director_name."</td>
                           </tr>";
                        echo   "<tr>
                                    <td height='50' align='left' style='font-size: 30px;font-family: 一纸情书'>
                                            上映时间：
                                    </td>
                                    <td style='font-size: 26px;font-family: 一纸情书'>".
                                            $f_date.
                                    "</td>
                                  </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td height='48' colspan='2' align='left' style='font-size: 30px;font-weight: bold;font-family: 一纸情书' >
                                电影简介：
                            </td>
                        </tr>
                        <tr>
                            <td colspan='2' style='font-size: 20px;line-height: 30px;'>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$info."
                            </td>
                        </tr>
                    </table>";
                                 ?>
                </td>
            </tr>
        </table>
    </div>
    <div style="margin-right: 35px;">
        <table class="pinglun" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="margin-right: 35px;">
            <tr>
                <td width="34">&nbsp;</td>
                <td colspan="3">
                    <span>
                        用户评论
                    </span>
                </td>
            </tr>
            <tr>
                <td width="34"></td>
                <td colspan="2" height="1" bgcolor="#e5e5e5"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <?php
                    error_reporting(0);
                    session_start();
                    $_SESSION['current_film_id']=$film;
                    include "conn.php";
                    $pa="touxiang/";
                    $jsql="select * from judgement where film_id={$film}";
                    $j_result=mysqli_query($con,$jsql);
                    $jre_num=mysqli_num_rows($j_result);
                    if($jre_num){
                        $jre_arr=array();
                        while ($rs3=mysqli_fetch_assoc($j_result)){
                            $jre_arr[]=$rs3;
                    }
                    for($i=0;$i<count($jre_arr);$i++) {
                        $judge_id=$jre_arr[$i]['judge_id'];
                        $_SESSION['delete_judge_id']=$judge_id;
                        $user_id = $jre_arr[$i]['user_id'];
                        $info = $jre_arr[$i]['info'];
                        $time = $jre_arr[$i]['judge_time'];
                        $result4 = $con->query("select * from user where user_id={$user_id}");
                        $row4=mysqli_num_rows($result4);
                        if($row4){
                            $arr4 = array();
                            while ($rs = mysqli_fetch_assoc($result4)) {
                                $arr4[] = $rs;
                            }
                            for ($j=0;$j<count($arr4);$j++){
                                $touxiang=$arr4[$j]['touxiang'];
                                $uname = $arr4[$j]['user_name'];
                            }
                        }
                        echo "<table width='95%' border='0' cellpadding='0' cellspacing='0' style='margin-top: 10px;'>
                            <tr>
                                <td  align='left' valign='top' >
                                <div>
                                    <div style='float: left;'>
                                        <div style='float: left;'>
                                            <img src='".$pa.$touxiang."' class='touxiang' style='border-radius:50%;width:70px;height:70px;'/>
                                        </div>
                                        <div style='float:right;margin-top: 15px;'> 
                                            <div style='font-size: 22px; color: #FF0099;font-family: 一纸情书'>".$uname."</div>
                                            <div style='font-size: 20px;font-family: 一纸情书;margin-top: 10px;'>".$info."</div>
                                        </div>
                                    </div>
                                    <div style='float: right'>
                                        <div><p style='float: right'>".$time."</p><br></div>";
                                if (isset($_SESSION['username'])){
                                    $sqlname="select user_id from user where user_name='{$_SESSION['username']}'";
                                    $resultname=mysqli_query($con,$sqlname);
                                    $rowname=mysqli_fetch_array($resultname);
                                    foreach ($rowname as $value){
                                        $sess_user_id=$value;
                                    }
                                    if($sess_user_id==$user_id){
                                        echo "<form action='deletejudge.php' method='post'>
                                            <input style='float: center;' type='submit' name='delete' value='删除' onclick='del()'>
                                            <input type='hidden' name='judge_id' value=' ".$judge_id."' >
                                        </form>";
                                    }
                                }
                          echo "</div></td>
                            </tr>
                        </table>
                        <DIV style='BORDER-TOP: #00686b 1px dashed; OVERFLOW: hidden; HEIGHT: 1px;width: 95%;float: right;'></DIV>";
                    }
                    }
                    else{
                        echo "<br><center><font>该电影还没有评论，去发表一个吧~</font></center>";
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="p">
        <table  cellspacing="0" cellpadding="0" bgcolor="#ffffff" class="w_1200" >
            <tr>
                <td width="34">&nbsp;</td>
                <td colspan="3">
                    <span>
                        发表评论
                    </span>
                </td>
            </tr>
            <tr>
                <td width="34"></td>
                <td colspan="2" height="1" bgcolor="#e5e5e5"></td>
            </tr>
            <tr>
                <td></td>
                <td align="left" valign="top" style="padding-top: 30px;">
                    <center>
                        <form id="f" action="" method="post">
                            <textarea name="comment" rows="5" cols="50" id="content"></textarea><br><br>
                            <br><br>
                            <input type="submit" name="submit" value="发表" id="submit">
                        </form>
                    </center>
                </td>
            </tr>
        </table>
    </div>
</div>
</html>
<?php
error_reporting(0);
include "conn.php";
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
session_start();
$film=$_GET['film'];
$username = $_SESSION['username'];
if(isset($_POST['submit'])) {
    if (isset($username)) {
        $comment = $_POST['comment'];
        $sql2 = "select user_id from user where user_name='{$username}'";
        $result2 = mysqli_query($con, $sql2);
        $row2 = mysqli_num_rows($result2);
        if ($row2) {
            $arr = array();
            while ($rs2 = mysqli_fetch_assoc($result2)) {
                $arr[] = $rs2;
            }
            for ($k = 0; $k < count($arr); $k++) {
                $u_id = $arr[$k]['user_id'];
            }
            $date = date("Y-m-d H:i:s");
            $sql3 = "insert into judgement(film_id,judge_time,info,user_id) VALUES ('{$film}','{$date}','{$comment}','{$u_id}')";
            $result3 = mysqli_query($con, $sql3);
            if ($result3) {
                echo "<script>history.go(-1);</script>";
            }
        }
    }else{
        echo "<script>alert('没有登录不能评论哦')</script>";
    }
}


?>


















