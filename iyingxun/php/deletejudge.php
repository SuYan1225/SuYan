<?php
error_reporting(0);
include "conn.php";
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
session_start();
$username = $_SESSION['username'];
$judge_id=$_SESSION['delete_judge_id'];
if(isset($username)){
    if($_POST['delete']&&$_POST['delete']=='删除'){
        $sql="select user_id from user where user_name='{$username}'";
        $result=$con->query($sql);
        $rowid=mysqli_fetch_array($result);
        foreach ($rowid as $value){
            $user_id=$rowid[0];
        }
        $usql="select user_id from judgement where judge_id='{$judge_id}'";
        $uresult=$con->query($usql);
        $urow=mysqli_fetch_array($uresult);
        foreach ($urow as $value){
            $jedge_judge_id=$value;
        }
        if($user_id==$jedge_judge_id){
            $sql="delete from judgement where user_id='{$user_id}' and judge_id='{$judge_id}'";
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