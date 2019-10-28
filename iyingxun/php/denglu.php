<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>i影资讯</title>
    <link rel="stylesheet" href="../css/denglustyle.css">
    <link rel="stylesheet " href="../css/main.css">
    <script type="text/javascript" src="../js/denglujs.js"></script>
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
            <a href="home.php">游客访问</a><span>|</span>
            <a href="magager.php">管理员</a>
        </div>
    </div>
</div>
<div class='neirong'>
    <div class='login_img'>
        <div class='carousel'>
            <figure >
                <a href='#t1'><img src='../image/电影1.jpg' alt=''></a>
            </figure>
            <figure >
                <a href='#t2'><img src='../image/电影2.jpg' alt=''></a>
            </figure>
            <figure >
                <a href='#t3'><img src='../image/电影3.jpg' alt=''></a>
            </figure>
            <figure >
                <a href='#t4'><img src='../image/电影4.jpg' alt=''></a>
            </figure>
            <figure >
                <a href='#t5'><img src='../image/电影5.jpg' alt=''></a>
            </figure>
            <figure >
                <a href='#t6'><img src='../image/电影6.jpg' alt=''></a>
            </figure>
        </div>
    </div>
    <div class='biankuang'>
        <form method='post' action='' class='login'>
            <div>
                <img src='../image/161K53609-13.jpg' class='login_touxiang'/>
<!--                --><?php
//                error_reporting(0);
//                header("content-type:text/html;charset:utf-8");
//                include "conn.php";
//                $sql1="select * from user where user_name='{$name}' and password='{$password}";
//                $result=mysqli_query($con,$sql1);
//                while ($row=mysqli_fetch_array($result)){
//                    echo "<img src='touxiang/".$row['touxiang']."' class='login_touxiang'>";
//                }
//                ?>
            </div>
            <div class='content'>
                <div class='infomation'>
                    <table>
                        <tr>
                            <td><label> 用户名：</label></td>
                            <td> <input type='text' name='name' id='name' placeholder='请输入用户名或者手机号' oninput = 'validate_name()' onfocus="validate_name()" ></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><div id="s_name"><input type='text' id='s_name' name='s_name' height='8px'></div></td>
                        </tr>
                        <tr>
                            <td><label>密&nbsp;&nbsp;码：</label></td>
                            <td><input type='password' name='password' id='password' placeholder='请输入密码' oninput='validate_password()' onfocus="validate_password()"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><div id="s_password"><input type='text' id='s_password' name='s_password' height='8px' ></div></td>
                        </tr>
                        <tr>
                            <td><label>验证码：</label></td>
                            <td><input type='text' name='yanzheng' id='yanzheng' placeholder='请输入验证码'  onfocus='validate_yanzheng()'></td>
                        </tr>

                    </table>
                    <input type='text' name='yanzhengma' readonly id='yanzhengma'>
                    <a href='#' onclick='createCode()' id='huan'>看不清？换一张</a>
                    <table>
                        <tr>
                            <td></td>
                            <td><div id="s_yanzheng"><input type='text'  id='s_yanzheng' name='s_yanzheng' height='8px' ></div></td>
                        </tr>
                    </table>
                </div>
                <div class='action'>
                    <input id='remenber' name='remenber' type='checkbox' checked='checked' />
                    <label>
                        下次自动登录
                    </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <label>
                        <a href=''>忘记密码？</a>
                    </label>
                </div>
                <div class='lo-zc'>
                    <table>
                        <tr>
                            <td><input type='submit' id='btdenglu' value='登录' name='submit'  /></td>
                        </tr>、
                        <tr>
                            <td><input type='button' id='btzhuce' value='注册' onclick="location.href='zhuce.php'" /><!--跳转到注册页面--></td>
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
session_start();
$con=new mysqli("localhost","root","","yingxun") or die("数据库连接失败!");
$con->query("set names 'utf8'");
if($_POST["submit"]){
    $name=$_POST["name"];
    $password=$_POST["password"];
    $sql="select * from user where user_name='{$name}' and password='{$password}'";
    $rs=$con->query($sql);
    $row=$rs->fetch_array();
    if($row['user_name']==$name && $row['password']==$password && !empty($name) &&!empty($password)){
        $_SESSION['username'] = $name;
        echo "<script>location.href='interests.php'</script>";
    }
    else{
        echo "登陆失败";
    }
}

?>