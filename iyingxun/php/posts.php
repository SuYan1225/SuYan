<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>i影资讯</title>
    <link rel='stylesheet' href='../css/main.css' type="text/css">
    <link rel="stylesheet" href="../css/poststyle.css">
    <link rel="stylesheet" href="../css/xiangxistyle.css">
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
                //显示头像
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
            <a href="denglu.php">退出</a>
            <span>|</span>
            <a href="denglu.php">注销</a>
            <span>|</span>
            <a href="personal.php">个人资料</a>
            <span>|</span>
            <a href="home.php">首页</a>
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
                        讨论帖
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
                        session_start();
                        $name=$_SESSION['username'];
                        $pa="touxiang/";
                        $sql="select user_id from user where user_name='{$name}'";
                        $result=$con->query($sql);
                        $rowid=mysqli_fetch_array($result);
                        foreach ($rowid as $value){
                            $user_id=$rowid[0];
                        }
                        $sql1="select * from posts";
                        $result1=mysqli_query($con,$sql1);
                        $num1=mysqli_num_rows($result1);
                        if($num1){
                            $arr1=array();
                            while ($rs=mysqli_fetch_assoc($result1)){
                                $arr1[]=$rs;
                            }
                            for($i=0;$i<count($arr1);$i++){
                                $id=$arr1[$i]['posts_id'];
                                $topic=$arr1[$i]['topic'];
                                $info=$arr1[$i]['info'];
                                $posts_user_id=$arr1[$i]['user_id'];
                                $day=$arr1[$i]['release_time'];
                                $result3=$con->query("select * from user where user_id='{$posts_user_id}'");
                                $num3=mysqli_num_rows($result3);
                                $arr3=array();
                                while ($rs3=mysqli_fetch_assoc($result3)){
                                    $arr3[]=$rs3;
                                }
                                for($k=0;$k<count($arr3);$k++){
                                    $touxiang=$arr3[$k]['touxiang'];
                                    $user_name=$arr3[$k]['user_name'];
                                }
                                $result4=$con->query("select * from posts where posts_id='{$id}'");
                                $num4=mysqli_num_rows($result4);
                                echo "<table width='90%'border='0' cellspacing='0'cellpadding='0' style='margin-top: 10px;'>";
                                echo "<tr><td align='left' valign='top'>";
                                echo "<div>
                                    <div style = 'position:relative'>
                                        <div >
                                            <div style='font-size: 22px; color: black;font-family: 一纸情书;font-weight: bold'>&nbsp;&nbsp;&nbsp;".$topic."</div>
                                            <div style='font-size: 20px;font-family: 一纸情书;margin-top: 10px;padding-left:40px'>".$info."</div>
                                        </div>
                                        <div style='padding-left:40px;margin-top: 15px;font-size: 15px; color: #CCCCCC;font-family: 一纸情书'> 
                                            <img src='".$pa.$touxiang."' class='touxiang' style='border-radius:50%;width:25px;height:25px;vertical-align: middle;'/>&nbsp;&nbsp;&nbsp;".$user_name."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$day."
                                        </div>
                                        <div style='position:absolute;right:0;top:60px;font-family: 一纸情书;font-size: 18px;'>
                                             <a href='post_info.php?posts_id=".$id."'>详情 ></a>
                                        </div>
                                        <div>";
                                        if (isset($_SESSION['username'])) {
                                            if ($num4) {
                                                $_SESSION['current_delete_post_id'] = $id;
                                                if ($posts_user_id == $user_id) {
                                                    echo "<form action='deletepost.php' method='post'>";
                                                    echo '<input style="position:absolute;right:6;top:32px;" type="submit" name="' . $id . '" value="删除" onclick="del()">';
                                                    echo "<input type='hidden' name='postid' value=' " . $id . "' >";
                                                    echo "</form>";
                                                }
                                            }
                                        }
                                echo "            
                                        </div>
                                    </div>
                               </div>" ;
                                echo "</td></tr>";
                                echo "</table>";
                            }
                        }
                        ?>
                </td>
            </tr>
        </table>
<!--            --><?php
//            error_reporting(0);
//            header("content-type:text/html;charset:utf-8");
//            include "conn.php";
//            session_start();
//            $name=$_SESSION['username'];
//            $sql="select user_id from user where user_name='{$name}'";
//            $result=$con->query($sql);
//            $rowid=mysqli_fetch_array($result);
//            foreach ($rowid as $value){
//                $user_id=$rowid[0];
//            }
//            $sql1="select * from posts";
//            $result1=mysqli_query($con,$sql1);
//            $num1=mysqli_num_rows($result1);
//            if($num1){
//                $arr1=array();
//                while ($rs=mysqli_fetch_assoc($result1)){
//                    $arr1[]=$rs;
//                }
//                for($i=0;$i<count($arr1);$i++){
//                    $id=$arr1[$i]['posts_id'];
//                    $topic=$arr1[$i]['topic'];
//                    $info=$arr1[$i]['info'];
//                    $posts_user_id=$arr1[$i]['user_id'];
//                    $day=$arr1[$i]['release_time'];
//                    $result3=$con->query("select * from posts where posts_id='{$id}'");
//                    $num3=mysqli_num_rows($result3);
//                    echo "<a><b>标题:</b></a>";
//                    echo '<a  href="post_info.php?posts_id='.$id.'">'.$topic.'</a>';
//                    echo "<a style='float:right'>".$day."</a></br>";
//                    if($num3){
//                        $_SESSION['current_delete_post_id']=$id;
//                        if($posts_user_id==$user_id){
//                            echo "<form action='deletepost.php' method='post'>";
//                            echo '<input style="float: right;" type="submit" name="'.$id.'" value="删除" onclick="del()">';
//                            echo "<input type='hidden' name='postid' value=' ".$id."' >";
//                            echo "</form>";
//                        }
//                    }
//                    echo "<hr>";
//                }
//            }
//            else{
//                echo "<p><center><font style='font-family: 一纸情书;font-weight: bold;font-size: 30px'>目前还什么都没有..</font></center></p>";
//            }
//            ?>
            </div>

    </div>
    <div class="p">
        <table  cellspacing="0" cellpadding="0" bgcolor="#ffffff" class="w_1200" >
            <tr>
                <td width="34">&nbsp;</td>
                <td colspan="3">
                    <span>
                        发表讨论帖
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
                        <form action="writeposts.php" method="post" style="font-family: 一纸情书;font-size: 24px;margin-left: 320px;">
                            讨论帖标题：&nbsp;&nbsp;<input type="text" name="title" placeholder="请输入标题" width="440px" height="26px"><br><br>
                            讨论帖内容：&nbsp;&nbsp;<textarea rows="10" cols="60" type="text" name="text" placeholder="请输入内容"> </textarea></br>
                            <input type="hidden" name="originator" value="<?php  session_start();
                            $code = mt_rand(0,1000000);
                            $_SESSION['code'] = $code;
                            echo $code;?>">
                            <input type="submit" name="fabiaosubmit" value="发表" id="submit" style="margin-left: 250px;margin-top: 25px;">
                        </form>
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>






