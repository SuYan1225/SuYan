<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>i影资讯</title>
    <link rel='stylesheet' href='../css/main.css' type="text/css">
    <link rel="stylesheet" href="../css/searchstyle.css">

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
            <?php
            error_reporting(0);
            session_start();
            include "conn.php";
            $pa="touxiang/";
            if(isset($_SESSION['username'])) {
                //显示头像
                $sql="select touxiang from user where user_name='{$_SESSION['username']}'";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_array($result);
                foreach ($row as $value){
                    $touxiang=$row[0];
                }
                echo "<div style='float:left'>";
                echo "<img src='".$pa.$touxiang."' class='touxiang'>&nbsp;&nbsp;";
                echo $_SESSION['username'];
                echo "</div>";

            }
            ?>
            <span>|</span>
            <a href="denglu.php">退出</a>
            <span>|</span>
            <a href="denglu.php">注销</a>
        </div>
    </div>
</div>
<div class="fenge">
    <tr></tr>
</div>
<div class="content">
    <div class="search">
        <center>
            <form action="searchposts.php" method="post">
                <input type="text" name="content" id="search" placeholder="讨论帖标题" >
                <input type="submit" name="submit" id="sousuo" value="搜索">
            </form>
        </center>
    </div>
    <div class="content_fenge">
        <tr></tr>
    </div>
    <div class="a">
        查询结果
    </div>
    <div class="re">
        <div style="margin-top: 20px;">
            <?php
            error_reporting(0);
            echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
            include "conn.php";
            session_start();
            if(isset($_POST['submit'])&&$_POST['submit']=='搜索') {
                $content = $_POST['content'];
                if ($content == "") {
                    echo "<script>alert('搜索内容不能为空！');history.go(-1);</script>";
                } else {
                    $sql = "SELECT DISTINCT * from posts WHERE topic LIKE '%{$content}%'";
                    $result = mysqli_query($con, $sql);
                    $num = mysqli_num_rows($result);
                    if ($num) {
                        $arr = array();
                        while ($rs = mysqli_fetch_assoc($result)) {
                            $arr[] = $rs;
                        }
                        for ($i = 0; $i < count($arr); $i++) {
                            $id = $arr[$i]['posts_id'];
                            $topic = $arr[$i]['topic'];
                            $time = $arr[$i]['release_time'];
                            echo "<a  ><b>标题:</b></a>";
                            echo '<a  href="post_info.php?posts_id='.$id.'">'.$topic.'</a>';
                            echo "<a style='float:right'>".$day."</a></br>";
                            echo "<hr>";
                        }
                     }
                     else{
                        echo "<p><center>暂时没有找到搜索内容哦~请重新输入吧~</center></p>";
                     }
                }
            }
            ?>
        </div>
    </div>
    <div style="position: relative;font-family: 一纸情书;font-size: 30px;margin-top:100px;">
        <center>
            <a href="posts.php">返回</a>
        </center>
    </div>
</div>
</body>
</html>
