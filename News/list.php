<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/11
 * Time: 14:39
 */

header("Content-Type:text/html;charset=utf8");
$db=new mysqli('localhost','root','','onesql');
$db->query ('set names utf8');
$cid=$_REQUEST['cid'];
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
    <title>文章列表</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/list.css">
    <link rel="stylesheet" href="js/swiper.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/index.js"></script>
</head>
<style>
    .demo { width:400px; background:#f0f0f0;  position:relative;  }
    .demo ul{height:32px;overflow:hidden;}
    .demo li{float:left;width:200px;text-align:center;position:relative;z-index:2;font-size:15px;line-height:32px;}
    .demo li em{position:absolute;right:-24px;top:-8px;width:0;height:0;line-height:0;border-width:24px 0 24px 24px;border-color:transparent  transparent transparent #fff;border-style:dashed dashed dashed solid;}
    .demo li i{position:absolute;right:-16px;top:0;width:0;height:0;line-height:0;border-width:16px 0 16px 16px;border-color:transparent  transparent transparent #f0f0f0;border-style:dashed dashed dashed solid;}
    .demo li.current{background:#31c7ff;color:#fff;z-index:1;}
    .demo li.current i{border-color:transparent transparent transparent #31c7ff;}
</style>
<body>
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
        <ul class="nav">
            <a href="index.php"><li>首页</li></a>
            <?php while ($row=$result->fetch_assoc()):?>
                <a href="list.php?cid=<?php echo $row['cid']?>">
                    <li><?php echo $row['cname']?></li>
                </a>
            <?php endwhile;?>
        </ul>
    </div>
</div>
<div class="demo">
    <ul class="clearfix">
        <li>首页<em></em><i></i></li>
        <li class="current">新闻列表<em></em><i></i></li>
    </ul>
</div>
<div style="width:100%;height: 925px">
    <div class="box">
        <?php
        $sql="select * from onesql.show WHERE cid=$cid";
        $result=$db->query($sql);
        ?>
        <?php while ($row=$result->fetch_assoc()):?>
            <div class="neirong">
                <a href="show.php?id=<?php echo $row['id']?>">
                    <div class="img" style="background-image: url('<?php echo $row['thumb']?>');background-size: cover"></div>
                </a>
                <div class="wen"><?php echo $row['title']?></div>
            </div>
        <?php endwhile;?>
    </div>
    <div class="swiper-container list">
        <p class="one">热门新闻推荐</p>
        <?php
        $sql="select * from onesql.show";
        $result=$db->query($sql);
        ?>
        <div class="swiper-wrapper" style="margin-top: 35px">
            <?php while ($row=$result->fetch_assoc()):?>
                <div class="swiper-slide">
                    <a href="show.php?id=<?php echo $row['id']?>">
                        <div class="imgs" style="background-image:url('<?php echo $row['thumb']?>');background-size: cover"></div>
                        <div class="wens">
                            <p class="two">[<?php echo $row['title']?>]</p>
                            <span><?php echo $row['content']?></span>
                        </div>
                    </a>
                </div>
            <?php endwhile;?>
        </div>
    </div>
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
<script src="js/swiper.min.js"></script>

</body>
</html>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        direction: 'vertical',
        slidesPerView:6,
        paginationClickable: true,
        spaceBetween: 30,
        mousewheelControl: true
    });
</script>