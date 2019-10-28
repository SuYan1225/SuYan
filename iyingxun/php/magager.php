<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>i影资讯</title>
    <link rel="stylesheet" href="../css/managerstyle.css">
    <link rel="stylesheet" href="../css/main.css">
    <script type="text/javascript" src="../js/managejs.js"></script>
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
<div class="neirong">
    <div class="login_img">
        <div class="carousel">
            <figure >
                <a href="#t1"><img src="../image/电影1.jpg" alt=""></a>
            </figure>
            <figure >
                <a href="#t2"><img src="../image/电影2.jpg" alt=""></a>
            </figure>
            <figure >
                <a href="#t3"><img src="../image/电影3.jpg" alt=""></a>
            </figure>
            <figure >
                <a href="#t4"><img src="../image/电影4.jpg" alt=""></a>
            </figure>
            <figure >
                <a href="#t5"><img src="../image/电影5.jpg" alt=""></a>
            </figure>
            <figure >
                <a href="#t6"><img src="../image/电影6.jpg" alt=""></a>
            </figure>
        </div>
    </div>
    <div class="guanli" style="display:block">
        <img src="../image/QQ图片20190429211938.jpg" class="gt"/>
        <form action="" method="post">
            <div class="gt_content">
                <div class="gt_info">
                    <table>
                        <tr>
                            <td><label>账号：</label></td>
                            <td><input type="text" name="zh" id="zh" placeholder="请输入管理员账号" oninput="validate_zh()" onfocus="validate_zh()"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><div id="szh"><input type="text" id="szh" name="szh" height="8px" ></div></td>
                        </tr>
                        <tr>
                            <td><label>密码：</label></td>
                            <td><input type="password" name="pwd" id="pwd" placeholder="请输入管理员密码" oninput="validate_pwd()" onfocus="validate_pwd()"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><div id="spwd"><input type="text" id="spwd" name="spwd" height="8px"></div></td>
                        </tr>
                    </table>
                </div>
                <div class="login">
                    <table>
                        <tr>
                            <td><input type="submit" name="submit" id="button" value="登录" /></td>
                        </tr>
                        <tr>
                            <td><input type="reset" id="reset" value="重置" /></td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<?php
error_reporting(0);
include "conn.php";
if(isset($_POST['submit'])){
    $name=$_POST['zh'];
    $password=$_POST['pwd'];
    $sql="select * from admin where name='{$name}' and password='{$password}'";
    $rs=$con->query($sql);
    $row=$rs->fetch_array();
    if($row['name']==$name && $row['password']==$password && !empty($name) &&!empty($password)){
        echo "<script>location.href='manage_film.php'</script>";
    }
    else{
        echo "<script>alert('只有管理员才能登录哦~');history.go(-1);</script>";
    }
}
?>