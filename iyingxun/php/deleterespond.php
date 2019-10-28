<?php
error_reporting(0);
include "conn.php";
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
session_start();
$username = $_SESSION['username'];
$posts_info_id=$_SESSION['delete_respnd_id'];
if(isset($username)){
    if($_POST['delete']&&$_POST['delete']=='删除'){
        $sql="select user_id from user where user_name='{$username}'";
        $result=$con->query($sql);
        $rowid=mysqli_fetch_array($result);
        foreach ($rowid as $value){
            $user_id=$rowid[0];
        }
        $usql="select user_id from posts_info where respond_idx='{$posts_info_id}'";
        $uresult=$con->query($usql);
        $urow=mysqli_fetch_array($uresult);
        foreach ($urow as $value){
            $respond_user_id=$value;
        }
        if($user_id==$respond_user_id){
            $sql="delete from posts_info where user_id='{$user_id}' and respond_idx='{$posts_info_id}'";
            $result=$con->query($sql);
            if($result){
                echo "<script>alert('删除成功！');history.back();</script>";
            }
        }
        else{
            echo "<script>alert('您不能删除他人发表的言论哦~！');history.back();</script>";
        }
    }

}
?>