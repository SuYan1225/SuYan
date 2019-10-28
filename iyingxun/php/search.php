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
<div class="content">
    <div class="search">
        <center>
            <form action="search.php" method="post">
                <input type="text" name="content" id="search" placeholder="电影名称\导演\演员\题材" >
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
        header("content-type:text/html;charset:utf-8");
        include "conn.php";
        session_start();
        if(isset($_POST['submit'])&&$_POST['submit']=='搜索') {
            $content = $_POST['content'];
            if ($content == "") {
                echo "<script>alert('搜索内容不能为空！');history.go(-1);</script>";
            } else {
                //根据输入的电影名称
                $fname_sql = "select * from film_info where film_name like '%{$content}%'";
                $fname_result = mysqli_query($con, $fname_sql);
                $fname_num = mysqli_num_rows($fname_result);
                if ($fname_num) {
                    $fname_arr = array();
                    while ($rs = mysqli_fetch_assoc($fname_result)) {
                        $fname_arr[] = $rs;
                    }
                }
                for ($i = 0; $i < count($fname_arr); $i++) {
                    $id = $fname_arr[$i]['film_id'];
                    $name = $fname_arr[$i]['film_name'];
                    $p = $fname_arr[$i]['picture'];
                    $path = "img/";
                    echo "<div style='float: left;margin-left: 50px;margin-bottom: 30px;' id='show'>";
                    echo '<a href="xiangxi.php?film=' . $id . '"><img src= ' . $path . $p . ' style="width:250px;height: 280px;hover:transform: scale(1.2,1.2);"/></a></br>';
                    echo "<div style='font-family: 一纸情书;font-size: 24px; font-weight: bold;text-align: center'>";
                    echo "<span>" . $name . "</span>";
                    echo "</div>";
                    echo "</div>";
                }
                //根据演员查找
                $actor_sql="SELECT DISTINCT film_info.* from film_info LEFT JOIN film_actor on film_info.film_id=film_actor.film_id LEFT JOIN actor on film_actor.actor_id=actor.actor_id where actor.actor_name like '%{$content}%'";
                $actor_result = mysqli_query($con, $actor_sql);
                $actor_num = mysqli_num_rows($actor_result);
                if ($actor_num) {
                    $actor_arr = array();
                    while ($rs = mysqli_fetch_assoc($actor_result)) {
                        $actor_arr[] = $rs;
                    }
                }
                for ($i = 0; $i < count($actor_arr); $i++) {
                    $id = $actor_arr[$i]['film_id'];
                    $name = $actor_arr[$i]['film_name'];
                    $p = $actor_arr[$i]['picture'];
                    $path = "img/";
                    echo "<div style='float: left;margin-left: 50px;margin-bottom: 30px;' id='show'>";
                    echo '<a href="xiangxi.php?film=' . $id . '"><img src= ' . $path . $p . ' style="width:250px;height: 280px;hover:transform: scale(1.2,1.2);"/></a></br>';
                    echo "<div style='font-family: 一纸情书;font-size: 24px; font-weight: bold;text-align: center'>";
                    echo "<span>" . $name . "</span>";
                    echo "</div>";
                    echo "</div>";
                }
                //根据导演查找
                $director_sql="SELECT DISTINCT film_info.* FROM film_info LEFT JOIN director on film_info.director_id=director.director_id where director_name like '%{$content}%'";
                $director_result = mysqli_query($con, $director_sql);
                $director_num = mysqli_num_rows($director_result);
                if ($director_num) {
                    $director_arr = array();
                    while ($rs = mysqli_fetch_assoc($director_result)) {
                        $director_arr[] = $rs;
                    }
                }
                for ($i = 0; $i < count($director_arr); $i++) {
                    $id = $director_arr[$i]['film_id'];
                    $name = $director_arr[$i]['film_name'];
                    $p = $director_arr[$i]['picture'];
                    $path = "img/";
                    echo "<div style='float: left;margin-left: 50px;margin-bottom: 30px;' id='show'>";
                    echo '<a href="xiangxi.php?film=' . $id . '"><img src= ' . $path . $p . ' style="width:250px;height: 280px;hover:transform: scale(1.2,1.2);"/></a></br>';
                    echo "<div style='font-family: 一纸情书;font-size: 24px; font-weight: bold;text-align: center'>";
                    echo "<span>" . $name . "</span>";
                    echo "</div>";
                    echo "</div>";
                }
                //根据电影类型查找
                $theme_sql="SELECT DISTINCT film_info.* from film_info LEFT JOIN film_theme on film_info.film_id=film_theme.film_id LEFT JOIN theme on film_theme.theme_id=theme.theme_id where theme.theme_name like '%{$content}%'";
                $theme_result = mysqli_query($con, $theme_sql);
                $theme_num = mysqli_num_rows($theme_result);
                if ($theme_num) {
                    $theme_arr = array();
                    while ($rs = mysqli_fetch_assoc($theme_result)) {
                        $theme_arr[] = $rs;
                    }
                }
                for ($i = 0; $i < count($theme_arr); $i++) {
                    $id = $theme_arr[$i]['film_id'];
                    $name = $theme_arr[$i]['film_name'];
                    $p = $theme_arr[$i]['picture'];
                    $path = "img/";
                    echo "<div style='float: left;margin-left: 50px;margin-bottom: 30px;' id='show'>";
                    echo '<a href="xiangxi.php?film=' . $id . '"><img src= ' . $path . $p . ' style="width:250px;height: 280px;hover:transform: scale(1.2,1.2);"/></a></br>';
                    echo "<div style='font-family: 一纸情书;font-size: 24px; font-weight: bold;text-align: center'>";
                    echo "<span>" . $name . "</span>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        }
        ?>
        </div>
    </div>
    <div class="fanhui">
        <center>
            <a href="home.php">返回</a>
        </center>

    </div>
</div>

</body>
</html>

