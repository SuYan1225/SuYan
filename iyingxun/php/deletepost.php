<?php
    error_reporting(0);
    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
    include "conn.php";
    $id=$_POST['postid'];
    session_start();
    $name=$_SESSION['username'];
    $id=$_SESSION['current_delete_post_id'];
    $sql="select user_id from user where user_name='{$name}'";
    $result=$con->query($sql);
    $rowid=mysqli_fetch_array($result);
    foreach ($rowid as $value){
        $user_id=$rowid[0];
    }
    $usql="select user_id from posts where posts_id='{$id}'";
    $uresult=$con->query($usql);
    $urow=mysqli_fetch_array($uresult);
    foreach ($urow as $value){
        $posts_user_id=$value;
    }
    if($user_id==$posts_user_id){
        $sql="delete from posts where user_id='{$user_id}' and posts_id='{$id}'";
        $result=$con->query($sql);
        if($result){
            echo "<script>alert('删除成功！');location.href='posts.php';</script>";
        }
    }
    else{
        echo "<script>alert('您不能删除他人的帖子哦~');location.href='posts.php';</script>";
    }

?>





