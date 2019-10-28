<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>i影资讯</title>
    <link rel='stylesheet' href='../css/main.css' type="text/css">
    <link rel="stylesheet" href="../css/interestsstyle.css">
    <script type='text/javascript' src='../js/interestsjs.js'></script>
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
            <a href="denglu.php">退出</a><span>|</span>
            <a href="magager.php">管理员</a>
        </div>
    </div>
</div>
<div class='neirong'>
    <div class='login_img'>
        <div class='carousel'>
            <figure >
                <a href='#t1'><img src='../image/电影1.jpg' alt=''></a>
            </figure>
            <figure >
                <a href='#t2'><img src='../image/电影2.jpg' alt=''></a>
            </figure>
            <figure >
                <a href='#t3'><img src='../image/电影3.jpg' alt=''></a>
            </figure>
            <figure >
                <a href='#t4'><img src='../image/电影4.jpg' alt=''></a>
            </figure>
            <figure >
                <a href='#t5'><img src='../image/电影5.jpg' alt=''></a>
            </figure>
            <figure >
                <a href='#t6'><img src='../image/电影6.jpg' alt=''></a>
            </figure>
        </div>
    </div>
    <div class='zhuce_biankuang'>
        <div class="content">
            <p>完善下资料，方便查找哦~</p>
            <form method='post' action='' class='interests'>
                全部类型<br>
                <label><input type="checkbox" name="check1[]" value="科幻">科幻</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" name="check1[]" value="冒险">冒险</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" name="check1[]" value="动作">动作</label><br>
                <label><input type="checkbox" name="check1[]" value="动画">动画</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" name="check1[]" value="战争">战争</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" name="check1[]" value="喜剧">喜剧</label><br>
                <label><input type="checkbox" name="check1[]" value="灾难">灾难</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" name="check1[]" value="武侠">武侠</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" name="check1[]" value="恐怖">恐怖</label><br>&nbsp;
                上映时间<br>
                <label><input type="checkbox" name="check2[]" value="2019">2019</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" name="check2[]" value="2018">2018</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" name="check2[]" value="2017">2017</label><br>
                <label><input type="checkbox" name="check2[]" value="2016">2016</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" name="check2[]" value="2015">2015</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" name="check2[]" value="更早">更早</label><br><br>
                <input type="submit" name="btsubmit"  class="btsubmit" value="完成"><br><br>
                <input  type="submit" name="jump" class="jump" value="跳过"  >
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
error_reporting(0);
header("content-type:text/html;charset:utf-8");
include "conn.php";
session_start();
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    $sql="select user_id from user where user_name='{$username}'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
    foreach ($row as $va){
           $user_id= $va;
    }
    if(isset($_POST['btsubmit'])&&$_POST['btsubmit']=='完成'){
        if($_POST['check1']!=null){
            for($i=0;$i<count($_POST['check1']);$i++){
                $sql1="select theme_id from theme where theme_name='{$_POST['check1'][$i]}'";
                $result1=mysqli_query($con,$sql1);
                $row1=mysqli_fetch_array($result1);
                foreach ($row1 as $va1){
                    $theme_id= $va1;
                    $sql2="insert into user_theme(user_id,theme_id)VALUES ('{$user_id}','{$theme_id}')";
                    mysqli_query($con,$sql2);
                }
//                如果已经存在则删除
//                $de_sql="select * from user_theme where user_id='{$user_id}' and theme_id='{$theme_id}'";
//                $de_result=mysqli_query($con,$de_sql);
//                $de_row=mysqli_fetch_array($de_result);
//                if($de_row){
//                    mysqli_query($con,"delete from user_theme where user_id='{$user_id}'");
//                }
//                foreach ($ro1 as $item){
//
//                }

            }
        }
        if($_POST['check2']!=null){
            for($j=0;$j<count($_POST['check2']);$j++) {
                $film_date=$_POST['check2'][$j];
                $sql4="insert into user_film_date(user_id,film_date)VALUES ('{$user_id}','{$film_date}')";
                mysqli_query($con,$sql4);
            }
//                $sql3="select film_date from film_info where film_date like '%{$_POST['check2'][$j]}%'";
//                $result3=mysqli_query($con,$sql3);
//                输出所有的符合匹配字符的结果
//                $row3=array();
//                while ($row3s=mysqli_fetch_array($result3)) {
//                    $row3[]=$row3s;
//                }
//                foreach ($row3 as $key=>$value){
//                    $date=$value['film_date'];
//                    echo $date;
//                }
//                把找到的匹配的时间存到数据库
//                $row3=mysqli_fetch_array($result3);
//                foreach ($row3 as $value){
//                    $date=$value;
//                }
//                $film_date=substr($date,0,strrpos($date,'年'));
//                $sql4="insert into user_film_date(user_id,film_date)VALUES ('{$user_id}','{$film_date}')";
//                mysqli_query($con,$sql4);
//            }
        }
        echo "<script>location.href='home.php'</script>";
    }
    if(isset($_POST['jump'])&&$_POST['jump']=='跳过'){
        echo "<script>location.href='home.php'</script>";
    }

}




?>



































