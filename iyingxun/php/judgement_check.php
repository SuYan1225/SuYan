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
            <img src="../image/161K53609-13.jpg" id="i">
            <input type="text" name="user" id="user">
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
</div>
</body>
</html>
<?php
error_reporting(0);
header("content-type:text/html;charset:utf-8");
include "conn.php";
session_start();
$n=$_SESSION['name'];
$film=$_SESSION['current_film_id'];
if(isset($_GET['submit'])){
    $comment=$_GET['comment'];
    $sql2=$con->query("select * from user where user_name='{$n}'");
    $row=mysqli_fetch_array($sql2);
    $u_id=$row['user_id'];
//    echo $film;
//    echo $u_id;
//    echo date("Y-m-d");
//    echo date("H:i:s");
//    echo $comment;
    $sql = "INSERT INTO judgement ( film_id, judge_time, info, user_id) VALUES ('{$film}', '".date("Y-m-d H:i:sa")."', '{$comment}', '{$u_id}')";
    //      echo "<br>";
    //      echo $sql;
    $result = mysql_query($sql);
    //$arr = array();
    //while($rs = mysql_fetch_assoc($result)){ $arr[]=$rs; }
    //print_r($arr);
}


?>

