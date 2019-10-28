<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>i影资讯</title>
    <link rel='stylesheet' href='../css/gerenziliaostyle.css'>
</head>
<body>
<div class='info'>
    <?php
    error_reporting(0);
    header("content-type:text/html;charset:utf-8");
    include "conn.php";
    session_start();
    $pa="touxiang/";
    if(isset($_SESSION['username'])) {
        $sql = "select * from user where user_name='{$_SESSION['username']}'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_num_rows($result);
        if ($row) {
            $arr = array();
            while ($rs = mysqli_fetch_assoc($result)) {
                $arr[] = $rs;
            }
            for($i=0;$i<count($arr);$i++){
                $user_name=$arr[$i]['user_name'];
                $password=$arr[$i]['password'];
                $sex=$arr[$i]['sex'];
                $phone=$arr[$i]['phone'];
                $touxiang=$arr[$i]['touxiang'];
            }
        }
        $theme_sql="SELECT theme.theme_name from theme LEFT JOIN user_theme on theme.theme_id=user_theme.theme_id LEFT JOIN `user` on user_theme.user_id=`user`.user_id where `user`.user_name='{$user_name}'";
        $theme_result=mysqli_query($con,$theme_sql);
        $theme_row=mysqli_num_rows($theme_result);
        if($theme_row){
            $theme_arr=array();
            while($rs = mysqli_fetch_assoc($theme_result)) {
                $theme_arr[] = $rs;
            }
        }
        echo "<table border='1' cellspacing='0' cellpadding='0' align='center'>";
        echo "<tr><td colspan='2'><font size='7px;'>我的资料</font></td></tr>";
        echo "<tr>
                   <td width='180px'><label>头&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;像：</label></td>
                   <td><img src='".$pa.$touxiang."'  style='width: 70px;height: 70px;border-radius: 50%;'></td>";
        echo "</tr>";
        echo "<tr style='height: 50px'>
                   <td><label>用&nbsp;&nbsp;户&nbsp;名：</label></td>
                   <td >".$user_name."</td>";
        echo "</tr>";
        echo "<tr style='height: 50px'>
                   <td><label>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</label></td>
                   <td>".$password."</td>";
        echo "</tr>";
        echo "<tr style='height: 50px'>
                   <td ><label>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</label></td>
                   <td>".$sex."</td>";
        echo "</tr>";
        echo "<tr style='height: 50px'>
                   <td ><label>手机号码：</label></td>
                   <td>".$phone."</td>";
        echo "</tr>";
        echo "<tr style='height: 50px'>
                   <td ><label>喜欢的电影类型：</label></td>
                   <td >";
        for($j=0;$j<count($theme_arr);$j++){
            $theme_name=$theme_arr[$j]['theme_name'];
            echo $theme_name."&nbsp;&nbsp;&nbsp;";
        }
        echo "</td></tr>";
        echo "</table><br><br>";
    }else{
        echo "<center>您还没登陆吧？快去登录，体验更多功能哦~</center>";
    }
    ?>
</div>
</body>
</html>
