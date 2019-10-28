<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>i影资讯</title>
    <link rel='stylesheet' href='../css/main.css' type="text/css">
    <link rel="stylesheet" href="../css/personalstyle.css">
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../js/personaljs.js"></script>
</head>
<body onload = "document.getElementById('sp').click();document.getElementById('my_h3').style.background = '#1acbfc'">
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
            <a href="home.php">首页</a>
            <span>|</span>
            <a href="posts.php">讨论帖</a>
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
<div id="menu">
    <div id="open">
        <div class="navBox">
            <ul>
                <li>
                    <h2 class="obtain" >我的资料</h2>
                    <div class="secondary">
                        <a id="sp" href="gerenziliao.php" target="right" >
                            <h3 id="my_h3">查看资料</h3></a>
                        <a  href="genggaiziliao.php" target="right">
                            <h3>更改资料</h3></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div id="rightContent">
<iframe name="right" src="" width="100%" height="100%" frameborder="0"></iframe>
</div>

</body>
</html>