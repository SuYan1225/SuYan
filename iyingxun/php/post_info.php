<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>i影资讯</title>
    <link rel='stylesheet' href='../css/main.css' type="text/css">
    <link rel="stylesheet" href="../css/post_infostyle.css">
    <link rel="stylesheet" href="../css/xiangxistyle.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../js/deletejs.js"></script>
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
            <?php
            error_reporting(0);
            session_start();
            include "conn.php";
            $pa="touxiang/";
            if(isset($_SESSION['username'])) {
                $sql="select touxiang from user where user_name='{$_SESSION['username']}'";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_array($result);
                foreach ($row as $value){
                    $touxiang=$row[0];
                }
                echo "<div style='float:left'>";
                echo "<img src='".$pa.$touxiang."' class='touxiang'>&nbsp;&nbsp;";
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
            <form action="searchposts.php" method="post">
                <input type="text" name="content" id="search" placeholder="讨论帖标题" >
                <input type="submit" name="submit" id="sousuo" value="搜索">
            </form>
        </center>
        <br>
    </div>
    <div class="content_fenge">
        <tr></tr>
    </div>
    <div class="t">
        <table class="pinglun" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="34"></td>
                <td colspan="3">
                    <span>
                        讨论帖详细信息
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
                header("content-type:text/html;charset:utf-8");
                include "conn.php";
                $post_id=$_GET['posts_id'];
                session_start();
                $_SESSION['current_post_id']=$post_id;
                $sql="select * from posts where posts_id='{$post_id}'";
                $result=$con->query($sql);
                $num=mysqli_num_rows($result);
                if($num) {
                    $arr = array();
                    while ($rs = mysqli_fetch_assoc($result)) {
                        $arr[] = $rs;
                    }
                }
                for($i=0;$i<count($arr);$i++) {
                    $topic = $arr[$i]['topic'];
                    $info = $arr[$i]['info'];
                }
                echo "<table width='90%'border='0' cellspacing='0'cellpadding='0' style='margin-top: 10px;'>";
                echo "<tr><td align='left' valign='top'>";
                echo "<div>
                                    <div style = 'position:relative'>
                                        <div >
                                            <div style='font-size: 22px; color: black;font-family: 一纸情书;font-weight: bold'>&nbsp;&nbsp;&nbsp;".$topic."</div>
                                            <div style='font-size: 20px;font-family: 一纸情书;margin-top: 10px;padding-left:40px'>".$info."</div>
                                        </div></div></div></td></tr></table>";
                ?>
                </td>
            </tr>
        </table>
        <table class="pinglun" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="34"></td>
                <td colspan="3">
                    <span>
                        回复
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
                    header("content-type:text/html;charset:utf-8");
                    include "conn.php";
                    $post_id=$_GET['posts_id'];
                    session_start();
                    $path="touxiang/";
                    $sql1="select * from posts_info where posts_id='{$post_id}'";
                        $result1=$con->query($sql1);
                        $num1=mysqli_num_rows($result1);
                        if($num1) {
                            $arr1 = array();
                            while ($rs = mysqli_fetch_assoc($result1)) {
                                $arr1[] = $rs;
                            }
                            for ($i = 0; $i < count($arr1); $i++) {
                                $posts_info_id=$arr1[$i]['respond_idx'];
                                $_SESSION['delete_respond_id']=$posts_info_id;
                                $user_id = $arr1[$i]['user_id'];
                                $respond_time = $arr1[$i]['respond_time'];
                                $respond_info = $arr1[$i]['respond_info'];
                                $sql2 = "select * from user where user_id='{$user_id}'";
                                $result2=mysqli_query($con,$sql2);
                                $row2=mysqli_num_rows($result2);
                                $arr2=array();
                                while($rs2=mysqli_fetch_assoc($result2)){
                                    $arr2[]=$rs2;
                                }
                                for ($x=0;$x<count($arr2);$x++){
                                    $touxiang=$arr2[$x]['touxiang'];
                                    $user_name=$arr2[$x]['user_name'];
                                }
                    echo "<table width='90%'border='0' cellspacing='0'cellpadding='0' style='margin-top: 10px;'>";
                    echo "<tr><td align='left' valign='top'>";
                    echo "<div>
                              <div style='float: left;'>
                                    <div style='float: left;'>
                                        <img src='".$path.$touxiang."' class='touxiang' style='border-radius:50%;width:60px;height:60px;'/>
                                    </div>
                                    <div style='float:right;margin-top: 15px;'> 
                                         <div style='font-size: 22px; color: #FF0099;font-family: 一纸情书'>&nbsp;&nbsp;".$user_name."</div>
                                         <div style='font-size: 20px;font-family: 一纸情书;margin-top: 10px;padding-left: 20px;'>".$respond_info."</div>
                                    </div>
                              </div>
                              <div style='float: right;font-family: 一纸情书'>
                                    <div><p style='float: right'>".$respond_time."</p><br></div>";
                                if (isset($_SESSION['username'])){
                                    $sqlname="select user_id from user where user_name='{$_SESSION['username']}'";
                                    $resultname=mysqli_query($con,$sqlname);
                                    $rowname=mysqli_fetch_array($resultname);
                                    foreach ($rowname as $value){
                                        $sess_user_id=$value;
                                    }
                                    if($sess_user_id==$user_id){
                                        echo "<form action='deleterespond.php' method='post'>
                                            <input style='float: center;' type='submit' name='delete' value='删除' onclick='del()'>
                                            <input type='hidden' name='judge_id' value=' ".$posts_info_id."' >
                                        </form>";
                                    }
                                }

                              echo "</div>
                           </div></td></tr></table>";
                            }
                        }
                        else{
                        echo "<p style='font-size: 24px; color: black;font-family: 一纸情书'><center>该帖还没有人回复..</p></center>";
                        }
                    ?>
                </td>
            </tr>
        </table>
        <table  cellspacing="0" cellpadding="0" bgcolor="#ffffff" class="pinglun" >
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
                    <form action="postjudge.php" method="post" style="font-family: 一纸情书;font-size: 24px;margin-left: 350px;">
                        <textarea name="comment" style="vertical-align:top" rows="10" cols="80" ></textarea>
                        <input type="hidden" name="originator" value="<?php  session_start();
                        $post_code = mt_rand(0,1000000);
                        $_SESSION['post_code'] = $post_code;
                        echo $post_code;?>">
                        </br><input type="submit" name="submit" value="提交" style="margin-top: 10px;margin-left: 270px;">
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>







