<?php
error_reporting(0);
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
include "conn.php";
session_start();
$code=$_SESSION['code'];
$title=$_POST['title'];
$content=$_POST['text'];
$name=$_SESSION['username'];
$date = date("Y-m-d H:i:s");
$sql="select user_id from user where user_name='{$name}'";
$result=$con->query($sql);
$rowid=mysqli_fetch_array($result);
foreach ($rowid as $value){
    $user_id=$rowid[0];
}
if(isset($_POST['fabiaosubmit'])&&$_POST['fabiaosubmit']=='发表'){
    if($_POST['originator']&&$_POST['originator'] == $_SESSION['code']){
        $sql2="insert into posts(user_id,topic,release_time,info)values ('{$user_id}','{$title}','{$date}','$content')";
        $result2=mysqli_query($con,$sql2);
        if($result2){
            echo "<script>alert('发表成功！');location.href='posts.php';</script>";
        }
        else{
            echo "<script>alert('发布失败！');location.href='posts.php';</script>";
        }
        unset($_SESSION["code"]);
    }
    else{
            echo "提交失败！";
    }
}
?>
