<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>i影资讯</title>
    <link rel='stylesheet' href='../css/main.css' type="text/css">
    <link rel="stylesheet" href="../css/homestyle.css">
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../js/homejs.js"></script>
    <script type="text/javascript" src="../js/jquery.flexslider-min.js"></script>
</head>
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
            <a href="posts.php">讨论帖</a>
            <span>|</span>
            <a href="personal.php">个人资料</a>
            <span>|</span>
            <a href="denglu.php">退出</a>
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
        <br>
    </div>
    <div class="content_fenge">
        <tr></tr>
    </div>
    <div id="f">
        <div id="film">
            <legend>
                猜您喜欢：
            </legend>
            <br>
            <?php
            error_reporting(0);
            session_start();
            $username = $_SESSION['username'];
            include "conn.php";
            if(isset($username)) {
                $sqlid = "select user_id from user where user_name='{$username}'";
                $resultid = mysqli_query($con, $sqlid);
                $rowid = mysqli_fetch_array($resultid);
                foreach ($rowid as $value) {
                    $id = $rowid[0];
                }
                // according to theme
                $sql1 = "SELECT DISTINCT film_info.* from film_info LEFT JOIN film_theme on film_info.film_id=film_theme.film_id LEFT JOIN user_theme on film_theme.theme_id=user_theme.theme_id where user_theme.user_id='{$id}'";
                $result1 = $con->query($sql1);
                $row = mysqli_fetch_all($result1);
                //分页
                $num = 6;
                $count = count($row);
                $w = ceil($count / $num);
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($page - 1) * $num;
                $sql2 = "SELECT DISTINCT film_info.* from film_info LEFT JOIN film_theme on film_info.film_id=film_theme.film_id LEFT JOIN user_theme on film_theme.theme_id=user_theme.theme_id where user_theme.user_id='{$id}' limit $offset,{$num}";
                $result2 = mysqli_query($con, $sql2);
                $arr1 = array();
                while ($rs = mysqli_fetch_array($result2)) {
                    $arr1[] = $rs;
                }
            }else{
                $num = 6;
                $count = count($row);
                $w = ceil($count / $num);
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($page - 1) * $num;
                $sql2 = "SELECT DISTINCT film_info.* from film_info LEFT JOIN film_theme on film_info.film_id=film_theme.film_id  limit $offset,{$num}";
                $result2 = mysqli_query($con, $sql2);
                $arr1 = array();
                while ($rs = mysqli_fetch_array($result2)) {
                    $arr1[] = $rs;
                }
            }
//                var_dump($arr1);
            $pag=($page==1)?0:($page-1);
            $n=($page==$w)?0:($page+1);
            //             theme results
            echo "<div >";
            for($i=0;$i<count($arr1);$i++){
                $id = $arr1[$i]['film_id'];
                $name = $arr1[$i]['film_name'];
                $p = $arr1[$i]['picture'];
                $path="img/";
                echo "<div id='show'><div class='imgBox'>";
                echo '<a href="xiangxi.php?film='.$id.'"><img src= '.$path.$p.' /></a>';
                echo "</div><div style='font-family: 一纸情书;font-size: 24px; font-weight: bold;text-align: center'>";
                echo "<span>".$name."</span>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
            echo "<div id='page'><center>";
            if ($page==1){
                echo "首页&nbsp;&nbsp;";
            }else{
                echo "<a href='?page=1'>首页</a>&nbsp;&nbsp;";
            }
            if ($pag){
                echo "<a href='?page={$pag}'>上一页</a>&nbsp;&nbsp;";
            }else{
                echo "上一页&nbsp;&nbsp;";
            }
            if ($n){
                echo "<a href='?page={$n}'>下一页</a>&nbsp;&nbsp;";
            }else{
                echo "下一页&nbsp;&nbsp;";
            }
            if($page== $w){
                echo "尾页";
            }else{
                echo "<a href='?page={$w}'>尾页</a>&nbsp;&nbsp;";
            }
            echo "</center></div>";
            ?>
        </div>


        <div class="right">
            <table  cellspacing="0" cellpadding="0" bgcolor="#ffffff" class="r">
                <tr>
                    <td colspan="3">
                    <span>
                        热搜
                    </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" height="1" bgcolor="#e5e5e5"></td>
                </tr>
                <tr>
                    <td >
                        <div id="frame" >
                            <a id="a1" class="num">1</a>
                            <a id="a2" class="num">2</a>
                            <a id="a3" class="num">3</a>
                            <a id="a4" class="num">4</a>
                            <a id="a5" class="num">5</a>
                            <div id="photos" class="play">
                                <img src="../image/home1.jpg" >
                                <img src="../image/home2.jpg" >
                                <img src="../image/home3.jpg" >
                                <img src="../image/home4.jpg" >
                                <img src="../image/QQ图片20190429211938.jpg" >
                                <ul id="dis">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <font color="red" size="6" style="font-weight: bold">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="">破冰行动的导演道歉</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" height="1" bgcolor="#e5e5e5"></td>
                </tr>
                <tr>
                    <td>
                        <br><font color="red" size="4" >2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="">00后最常用的表情</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" height="1" bgcolor="#e5e5e5"></td>
                </tr>
                <tr>
                    <td>
                        <br><font color="red" size="4" >3</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="">俄罗斯飞机迫降起火</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" height="1" bgcolor="#e5e5e5"></td>
                </tr>
                <tr>
                    <td>
                        <br><font color="red" size="4" >4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="">股市</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" height="1" bgcolor="#e5e5e5"></td>
                </tr>
                <tr>
                    <td>
                        <br><font color="red" size="4">5</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="">杨天真</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><font color="red" size="4">6</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="">素食汉堡</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><font color="red" size="4">7</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="">儿童节玩乐挑战</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><font color="red" size="4">8</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="">drake格林</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><font color="red" size="4">9</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="">夏雪</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>


