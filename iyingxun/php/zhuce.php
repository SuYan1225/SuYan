<!DOCTYPE html>
<html lang='en'>
<head>
 <meta charset='UTF-8'>
 <title>i影资讯</title>
 <link rel='stylesheet' href='../css/zhucestyle.css'>
    <link rel="stylesheet" href="../css/main.css">
 <script type='text/javascript' src='../js/zhuce.js'></script>
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
      <a href="">游客访问</a><span>|</span>
      <a href="denglu.php">登录</a><span>|</span>
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
     <div class='zhuce_biankuang'   >
          <form method='post' action='' class='register' enctype="multipart/form-data">
               <div class='zhuce_content'>
                    <div class='zhuce_information'>
                         <table>
                             <tr>
                                 <td>头&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;像:</td>
                                 <td><input type="file" name="touxiang" style="width: 180px;"></td>
                             </tr>
                             <tr>
                                 <td></td>
                                 <td></td>
                             </tr>
                              <tr>
                                   <td> 用&nbsp;&nbsp;户&nbsp;名：</td>
                                   <td><input type='text'name='zc_name' id='zc_name' placeholder='请设置你的用户名' oninput='v_zc_name()' onfocus='v_zc_name()'></td>
                              </tr>
                              <tr>
                                   <td></td>
                                   <td><div id='zs_name'><input type='text' id='zs_name' name='zs_name' height='8px' ></></td>
                              </tr>
                              <tr>
                                   <td> 密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</td>
                                   <td><input type='password' name='password1' id='password1' placeholder='请设置密码' oninput='v_zc_password()' onfocus='v_zc_password()'></td>
                              </tr>
                              <tr>
                                   <td></td>
                                   <td><div id='zs_password1'><input type='text' id='zs_password1' name='zs_password1' height='8px' ></div></td>
                              </tr>
                              <tr>
                                   <td>确认密码：</td>
                                   <td> <input type='password' name='password2' id='password2' placeholder='请确认密码' oninput='v_zc_password()' onfocus='v_zc_password()'></td>
                              </tr>
                              <tr>
                                   <td></td>
                                   <td><div id='zs_password2'><input type='text' id='zs_password2' name='zs_password2' height='8px' ></div></td>
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
                                   <td><input type='text' name='phone' id='phone' placeholder='请填写手机号码' oninput='v_zc_phone()' onfocus='v_zc_phone()'></td>
                              </tr>
                              <tr>
                                   <td></td>
                                   <td><div id='zs_phone'><input type='text' id='zs_phone' name='zs_phone' height='8px' ></div></td>
                              </tr>
                         </table>
                    </div>
                   <div class='zc'>
                       <table>
                           <tr>
                               <td><input type='submit' id='zhuce' value='注册'  name='submit'></td><!--跳转到登陆页面-->
                           </tr>
                           <tr>
                               <td><input type='reset' id='chongzhi' value='重置'></td>
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
if(isset($_POST["submit"])){
    $pa="touxiang/";
    $target=$pa.basename($_FILES['touxiang']['name']);
    $touxiang=$_FILES["touxiang"]["name"];
    $zc_name=$_POST["zc_name"];
    $password1=$_POST["password1"];
    $password2=$_POST["password2"];
    $sex=$_POST["sex"];
    $phone=$_POST["phone"];
    if($zc_name==""||$password1==""||$password2==""||$sex==""||$phone==""){
        echo "<script>alert('信息还不完整~别偷懒吼~')</script>";
    }
    else {
        $sql="select * from user where user_name  like '$zc_name' ";
        $result=$con->query($sql);
        $num=mysqli_num_rows($result);
        if($num>0){
            echo "<script>alert('该用户名已经注册过~再想一个呗');history.go(-1)</script>";
        }
        else{
            $sql2="insert into user (user_name,password,phone,sex,touxiang) values('{$zc_name}','{$password1}','{$phone}','{$sex}','{$touxiang}')";
            $result2=mysqli_query($con,$sql2);
            move_uploaded_file($_FILES['touxiang']['tmp_name'],$target);
            if($result2){
                echo "<script>alert('注册成功啦！');location.href='denglu.php';</script>";
//                header("refresh:2;url=interests.php");
            }
            else{
                echo "<script>alert('注册失败啦！');history.go(-1);</script>";
            }
        }
    }
}
?>
