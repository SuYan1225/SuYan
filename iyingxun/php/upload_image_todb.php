<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>i影资讯</title>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/upload_image.js"></script>
</head>
<body>

    <div class="su">
<!--        --><?php
//        error_reporting(0);
//        header("content-type:text/html;charset:utf-8");
//        include "conn.php";
//        $sql1="select * from photo";
//        $result=mysqli_query($con,$sql1);
//        while ($row=mysqli_fetch_array($result)){
//            echo "<div>";
//            echo "<img src='img/".$row['image']."'>";
//            echo $row['text'];
//            echo "</div>";
//        }
//        ?>
       <form method="post" action="" enctype="multipart/form-data">
           <input type="hidden" name="size" value="100000">
           <div class="i">
               <input type="file" name="image"/>
           </div>
           <div>
               <textarea name="text" cols="40"rows="4"></textarea>
           </div>
           <tr>
               <td>
                   <textarea name="jingli" cols="80"rows="6" class="text" placeholder="演艺经历~"></textarea>
               </td>
           </tr>
           <div>
               <input type="submit" name="upload" value="提交" onclick="getfilename()">
           </div>
       </form>
    </div>





</body>
</html>
<?php
error_reporting(0);
header("content-type:text/html;charset:utf-8");
include "conn.php";
session_start();
if(isset($_POST['upload'])){
    $pa="img/";
    $target=$pa.basename($_FILES['image']['name']);
    $image=$_FILES["image"]["name"];
    $text=$_POST['jingli'];
    $text=str_replace(chr(13),'<br>',$text);
    $text=str_replace(chr(32),'&nbsp;',$text);
//    $jingli=ereg_replace(" ","&nbsp",$jl);
//   $jingli=ereg_replace("\r","<br>",$jl);
//   $jingli=ereg_replace("\n","<br>",$jl);
//    if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
//        $sql1="select * from photo";
//        $result=mysqli_query($con,$sql1);
//        while ($row=mysqli_fetch_array($result)){
//            echo "<div>";
//            echo "<img src='".$pa.$row['image']."'>";
//            echo $row['text'];
//            echo "</div>";
//        }
//    }
//    else{
//        echo "失败 ";
//    }



}?>