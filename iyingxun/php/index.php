<!DOCTYPE >
<html >
<head>
    <meta charset="utf-8" />
    <title>无标题文档</title>
</head>
<body>
<div class="content">
    <?php
    error_reporting(0);
    header("content-type:text/html;charset:utf-8");
    session_start();
    $con=new mysqli("localhost","root","","yingxun") or die("数据库连接失败!");
    $con->query("set names 'utf8'");
    $sql="select * from images";
    $result=mysqli_query($con,$sql);
    while ($row=mysqli_fetch_array($result)){
        echo "<div id='imag_div'>";
        echo "<img src='image/".$row['image']."'>";
        echo "<P>".$row['text']."</P>";
        echo "</div>";
    }
    ?>
    <form action="" method="get" enctype="multipart/form-data">
        <input type="hidden" name="size" value="10000000000">
        <div>
            <input type="file" name="image">
        </div>
        <div>
            <textarea name="text" cols="40" rows="8"> </textarea>
        </div>
        <div>
            <input type="submit" value="提交 " name="submit"/><br/>
        </div>
    </form>
</div>
</body>
</html>
<?php
error_reporting(0);
session_start();
header("content-type:text/html;charset:utf-8");
$con=new mysqli("localhost","root","","yingxun") or die("数据库连接失败!");
$con->query("set names 'utf8'");
$msg="";
if(isset($_GET['submit'])){
    $target="image/".basename($_FILES['image']['name']);
    $image=$_FILES['image']['name'];
    $text=$_GET['text'];
    $sql="insert into images(image,text) VALUES ('$image','$text')";
    mysqli_query($con,$sql);
    if(move_uploaded_file($_FILES['image']['tmp_name'].$target)){
        $msg="存储成功！";
    }
    else{
        $msg="失败！";
    }
}
else{
    $msg="error";
}
?>