






<?php
//error_reporting(0);
//echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
//session_start();
//include "conn.php";
////$username = $_SESSION['username'];
////$decode=$_SESSION['decode'];
//$film=$_GET['film'];
//echo $film;
//if(isset($_POST['submit'])&&$_POST['submit']=='发表') {
//    if ($_POST['originator'] && $_POST['originator'] == $decode) {
//        $comment = $_POST['comment'];
//        $sql2 = "select user_id from user where user_name='{$username}'";
//        $result2 = mysqli_query($con, $sql2);
//        $row2 = mysqli_num_rows($result2);
//        if ($row2) {
//            $arr = array();
//            while ($rs2 = mysqli_fetch_assoc($result2)) {
//                $arr[] = $rs2;
//            }
//            for ($k = 0; $k < count($arr); $k++) {
//                $u_id = $arr[$k]['user_id'];
//            }
//            $date = date("Y-m-d H:i:s");
//            $sql3 = "insert into judgement(film_id,judge_time,info,user_id) VALUES ('{$film}','{$date}','{$comment}','{$u_id}')";
//            $result3=mysqli_query($con, $sql3);
////            if($result3){
////                echo "<script>alert('评论');</script>";
////            }
////            else{
////                echo "<script>alert('评论失败');location.href='xiangxi.php';</script>";
////            }
//        }
//        unset($_SESSION["code"]);
//    }
//    else{
//        echo "<script>alert('sda');location.href='xiangxi.php';</script>";
//    }
//}
//if(isset($_POST['delete'])){
////    $del_sql="delete * from judgement where "
//}
//?>