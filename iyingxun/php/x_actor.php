<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>i影资讯</title>
    <link rel='stylesheet' href='../css/main.css' type="text/css">
    <link rel="stylesheet" href="../css/xiangxistyle.css">
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

            //            include "conn.php";
            //            $sqlid="select user_id from user where user_name='{$username}'";
            //            $resultid=mysqli_query($con,$sqlid);
            //            $rowid=mysqli_fetch_array($resultid);
            //            foreach ($rowid as $value){
            //                $id=$rowid[0];
            //            }
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
            <a href="denglu.php">退出</a>
            <span>|</span>
            <a href="denglu.php">注销</a>
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
    <div>

    </div>


</div>
</body>
</html>

<?php
