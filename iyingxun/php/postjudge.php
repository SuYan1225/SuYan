<?php
error_reporting(0);
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
include "conn.php";
session_start();
$n=$_SESSION['username'];
$post_code=$_SESSION['post_code'];
$post=$_SESSION['current_post_id'];
if(isset($_POST['submit'])&&$_POST['submit']=='提交'){
    if($_POST['originator']&&$_POST['originator'] == $_SESSION['post_code']) {
        $comment = $_POST['comment'];
        $date=date("Y-m-d H:i:sa");
        $sql = $con->query("select * from user where user_name='{$n}'");
        $row = mysqli_fetch_array($sql);
        $u_id = $row['user_id'];
        $sql1 = "insert into posts_info(posts_id,respond_idx,respond_time,user_id,respond_info)values('{$post}',null,'{$date}','{$u_id}','{$comment}')";
        $result = $con->query($sql1);
        if($result){
            echo "<script>alert('评论成功！');location.href='post_info.php?posts_id=".$post."';</script>";
        }
        else{
            echo "<script>alert('评论失败！');location.href='post_info.php?posts_id=".$post."';</script>";
        }
        unset($_SESSION["code"]);
    }
    else{
        echo "提交失败！";
    }
}
?>