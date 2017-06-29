<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/11
 * Time: 14:24
 */

header("Content-Type:text/html;charset=utf8");
$db=new mysqli('localhost','root','','onesql');
$db->query ('set names utf8');
$sql="select * from category";
$result=$db->query($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/index.js"></script>
    <script src="js/animate.js"></script>
</head>
<body>
<a name="top"></a>
<section class="top"></section>
<div class="top">
    <div class="logo">
        <img src="img/logo.png">
        <a href="index.php">
            <span>澎湃新闻</span>
            <span>PENG PAI NEWS</span>
        </a>
    </div>
    <div class="head">
        <ul class=nav>
            <a href="index.php"><li>首页</li></a>
            <?php while ($row=$result->fetch_assoc()):?>
                <a href="list.php?cid=<?php echo $row['cid']?>">
                    <li><?php echo $row['cname']?></li>
                </a>
            <?php endwhile;?>
        </ul>
    </div>
</div>
<div class="banner">
    <ul>
        <?php
            $sql="select * from onesql.show WHERE positionid=2";
            $result=$db->query($sql);
        ?>
        <?php while ($row=$result->fetch_assoc()):?>
            <a href="show.php?id=<?php echo $row['id']?>">
                <li style="background-image: url('<?php echo $row['thumb']?>');background-size: cover" ></li>
            </a>
        <?php endwhile;?>
    </ul>
    <div class="left">&lt;</div>
    <div class="right">&gt;</div>
</div>
<div class="footer">
    <a href="#top" class="mao">TOP</a>
   <div class="recent">
       <p>Recent Events</p>
       <ul>
           <li>High School Summer Retreat</li>
           <li>VBS</li>
           <li>Discover Real Life</li>
           <li>Girls Night Out</li>
           <li>Estate Planning</li>
       </ul>
   </div>
    <div class="Resources">
        <p>Resources</p>
        <ul>
            <li>High School Summer Retreat</li>
            <li>VBS</li>
            <li>Discover Real Life</li>
            <li>Girls Night Out</li>
            <li>Estate Planning</li>
        </ul>
    </div>
    <div class="ma">
        <div class="logobox">
            <img src="img/logo.png">
        </div>
        <img src="img/ma.jpg">
    </div>

</div>
</body>
</html>

