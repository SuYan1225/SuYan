<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>i影资讯</title>
    <link rel="stylesheet" href="../css/manage_filmstyle.css">
    <link rel="stylesheet" href="../css/main.css">
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
            <a href="denglu.php">用户登录</a><span>|</span>
            <a href="zhuce.php">用户注册</a>
        </div>
    </div>
</div>
<div class="nav">
    <ul>
        <li>
            <a href="manage_film.php">影片信息</a>
        </li>
        <li>
            <a href="manage_actor.php">演员信息</a>
        </li>
        <!--        <li>-->
        <!--            <a href="">导演信息</a>-->
        <!--        </li>-->
    </ul>
</div>
<div class="add">
    <form action="" method="post"  enctype="multipart/form-data">
        <table align="center" border="0" cellspacing="0" cellpadding="0">
            <th>
                演员信息
            </th>
            <tr>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td>
                    <input type="text" name="actor" class="f_name" placeholder="请输入演员名字">
                </td>
            </tr>
            <tr><td></td></tr>

            <tr>
                <td>
                    <textarea name="text" cols="80"rows="4" class="text" placeholder="个人简介~"></textarea>
                </td>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td>
                    <textarea name="jingli" cols="80"rows="4" class="text" placeholder="演艺经历~"></textarea>
                </td>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td>
                    <input type="submit" name="upload" value="提交" class="submit">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
<?php
error_reporting(0);
header("content-type:text/html;charset:utf-8");
include "conn.php";
session_start();
if(isset($_POST['upload'])) {
    $pa = "img_actor/";
    $target = $pa . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    $actor=$_POST['actor'];
    $text = $_POST['text'];
    $jingli=$_POST['jingli'];
    $jingli=str_replace(chr(13),'<br>',$jingli);
    $jingli =str_replace(chr(32),'&nbsp;&nbsp;&nbsp;&nbsp;',$jingli);
    $sql = "insert into actor(actor_name,info,picture,jingli)VALUES ('{$actor}','{$text}','{$image}','{$jingli}')";
    mysqli_query($con, $sql);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql1 = "select * from actor";
        $result = mysqli_query($con, $sql1);
    }
}
$sql2="select * from actor";
$result2=mysqli_query($con,$sql2);
$num2=mysqli_num_rows($result2);
if($num2){
    $arr2 = array();
    while($rs = mysqli_fetch_assoc($result2)){
        $arr2[]=$rs;
    }
}
echo "<table border='1' cellpadding='0' cellspacing='0' style='margin: 20px 20px;'>";
for($i=0;$i<count($arr2);$i++) {
    $actor_id = $arr2[$i]['actor_id'];
    $actor_name = $arr2[$i]['actor_name'];
    $info= $arr2[$i]['info'];
    $info_show=mb_strlen($info, 'utf-8') >75? mb_substr($info, 0, 75, 'utf-8').'....' : $info;
    $j=$arr2[$i]['jingli'];
    $jingli_show=mb_strlen($j, 'utf-8') > 75? mb_substr($j, 0, 75, 'utf-8').'....' : $j;
    echo "<tr>
<td style='width: 20px;height: 20px;'>".$actor_id."</td>
<td>".$actor_name."</td>
<td>".$info_show."</td>
<td>".$jingli_show."</td>
</tr>";
}
echo "</table>";
?>