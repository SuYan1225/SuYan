<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>i影资讯</title>
    <link rel='stylesheet' href='../css/genggaiziliaostyle.css'>
    <script type='text/javascript' src='../js/genggaiziliaojs.js'></script>
</head>
<body>
<center>
<div>
    <div class="ts">
        *除了用户名不可以更改，其他的都可以更改哦~
    </div>
    <br>
    <div class='neirong'>
        <form method='post' action='' class='changeinfo' enctype="multipart/form-data">
            <div class='content'>
                <div class='information'>
                    <table>
                        <tr>
                            <td> 头&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;像：</td>
                            <td><input type="file" name="image"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><span id='cname'><input type='text' id='cname' name='cname' height='8px' ></span></td>
                        </tr>
                        <tr>
                            <td> 密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</td>
                            <td><input type='text' name='pwd' id='pwd' placeholder='请设置密码' onclick='vpassword()'></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><span id='cpassword1'><input type='text' id='cpassword1' name='cpassword1' height='8px' ></span></td>
                        </tr>
                        <tr>
                            <td>确认密码：</td>
                            <td> <input type='text' name='pwd2' id='pwd2' placeholder='请确认密码'  onclick='vpassword()'></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><span id='cpassword2'><input type='text' id='cpassword2' name='cpassword2' height='8px' ></span></td>
                        </tr>
                        <tr>
                            <td> 性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</td>
                            <td><input type='radio' name='sex' id='radio1' value='男' checked>男   &nbsp;&nbsp;&nbsp;
                                <input type='radio' name='sex' id='radio2' value='女' >女</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> 手机号码：</td>
                            <td><input type='text' name='userphone' id='userphone' placeholder='请填写手机号码' onclick='phone()'></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><span id='cphone'><input type='text' id='cphone' name='cphone' height='8px' ></span></td>
                        </tr>
                    </table>
                </div>
                <div class='zc'>
                    <table>
                        <tr>
                            <td><input type='submit' id='change' value='更改'  name='change'></td><!--跳转到登陆页面-->
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
</center>
</body>
</html>
<?php
    error_reporting(0);
    header("content-type:text/html;charset:utf-8");
    include "conn.php";
    session_start();
    $pa="touxiang/";
    if(isset($_SESSION['username'])) {
        $user_name=$_SESSION['username'];
        if(isset($_POST['change'])&&$_POST['change']=="更改"){
            $target=$pa.basename($_FILES['image']['name']);
            $image=$_FILES["image"]["name"];
            $password=$_POST['pwd'];
            $sex=$_POST["sex"];
            $phone=$_POST["userphone"];
            $sql="update user set touxiang='{$image}',password='{$password}',sex='{$sex}',phone='{$phone}' where user_name='{$user_name}'";
            $result=mysqli_query($con,$sql);
            move_uploaded_file($_FILES['image']['tmp_name'],$target);
            if($result){
                echo "<script>alert('更改成功啦~');history.go(-1);</script>";
            }
            else{
                echo  "<script>alert('更改失败！');history.go(-1);</script>";
            }
        }
    }
    else{
        echo "先去登录才能修改信息哦~";
    }
    ?>


