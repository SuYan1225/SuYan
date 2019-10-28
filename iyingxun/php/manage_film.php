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
            <a href="zhuce.php">用户注册</a><span>|</span>
            <a href="magager.php">退出</a>
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
                    添加影片
            </th>
            <tr>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td>
                    <input type="text" name="f_name" class="f_name" placeholder="请输入影片名称">
                </td>
            </tr>
            <tr><td></td></tr>

            <tr>
                <td>
                    <input type="text" name="f_date" class="f_date" placeholder="影片年份">
                </td>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td>
                    <input type="text" name="f_director"  class="f_director" placeholder="请输入导演">
                </td>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td>
                    类型：<select name="select" size="1">
                            <option value="科幻">科幻</option>
                            <option value="冒险">冒险</option>
                            <option value="动作">动作</option>
                            <option value="动画">动画</option>
                            <option value="战争">战争</option>
                            <option value="喜剧">喜剧</option>
                            <option value="灾难">灾难</option>
                            <option value="武侠">武侠</option>
                          </select>
                </td>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td>
                    <input type="text" name="f_actor"  class="f_actor" placeholder="参演演员">
                </td>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td>
                    <textarea name="text" cols="80"rows="6" class="text" placeholder="描述一下电影吧~"></textarea>
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
    $pa = "img/";
    $target = $pa . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    $f_name=$_POST['f_name'];
    $f_date=$_POST['f_date'];
    $f_director=$_POST['f_director'];
    $f_actor_string=$_POST['f_actor'];
    $leixing=$_POST['select'];



    $dsql="select director_id from director where director_name='{$f_director}'";
    $dre=mysqli_query($con,$dsql);
    $rowrus=mysqli_fetch_array($dre);
    foreach ($rowrus as $va){
        $director_id= $va;
    }
    $text = $_POST['text'];
    $sql = "insert into film_info(film_name,film_date,info,director_id,picture)VALUES ('{$f_name}','{$f_date}','{$text}','{$director_id}','{$image}')";
    mysqli_query($con, $sql);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql1 = "select * from film_info";
        $result = mysqli_query($con, $sql1);
    }


    //查找电影对应的id
    $fisql="select film_id from film_info where film_name='{$f_name}'";
    $fire=mysqli_query($con,$fisql);
    $firow=mysqli_fetch_array($fire);
    foreach ($firow as $va){
        $film_id=$va;
    }
    $f_actor=explode('，',$f_actor_string);
    foreach ($f_actor as $item){
        $f_actor=$item;
        $asql="select actor_id from actor where actor_name='{$f_actor}'";
        $are=mysqli_query($con,$asql);
        $rowa=mysqli_fetch_array($are);
        foreach ($rowa as $va){
            $actor_id= $va;
        }
        $acsql="insert into film_actor(film_id,actor_id) values('{$film_id}','{$actor_id}')";
        mysqli_query($con,$acsql);
    }

//存放类型
    $tsql="select theme_id from theme where theme_name='{$leixing}'";
    $tre=mysqli_query($con,$tsql);
    $rowt=mysqli_fetch_array($tre);
    foreach ($rowt as $va){
        $theme_id=$va;
    }
    $thesql="insert into film_theme(film_id,theme_id)VALUES ('{$film_id}','{$theme_id}')";
    mysqli_query($con,$thesql);
}
?>

