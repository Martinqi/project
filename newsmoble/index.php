

<?php
include "public.php";
$sql="select * from category";
$result=$db->query($sql);
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title> 
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/index.css">
    <script src="js/mui.min.js"></script>
    <script src="js/iscroll.js"></script>
    <script src="js/demoUtils.js"></script>
    <script type="text/javascript" charset="utf-8">
        mui.init();
    </script>
    <script type="text/javascript">
     var myScroll;
function loaded () {
	myScroll = new IScroll('#wrapper', { mouseWheel: true, click: true });
}
document.addEventListener('touchmove', function (e) { e.preventDefault(); }, isPassive() ? {
	capture: false,
	passive: false
} : false);
</script>
</head>
<body onload="loaded()">
<div class="mui-off-canvas-wrap mui-draggable">
        <!-- 主页面容器 -->       
       <aside class="mui-off-canvas-left" id="offCanvasSide">
            <div class="mui-scroll-wrapper">
                <div class="mui-scroll">
                </div>
            </div>
       </aside>     
    <div class="mui-inner-wrap">
        <!-- 主页面标题 -->
        <header  class="mui-bar mui-bar-nav">
            <a class="mui-icon mui-action-menu mui-icon-bars mui-pull-left"  href="#offCanvasSide" ></a>
            <h1 class="mui-title">澎湃新闻</h1>
            <?php
            if(isset($_SESSION["memberlogin"])) {
                ?>
                <a style="float: right;margin-top: 12px" href="list.php">欢迎 <?php echo $_SESSION["name"]?></a>
                <?php
            }else {
                ?>
                <a class="mui-icon mui-icon-contact mui-pull-right" href="admin.php"></a>
                <?php
            }
            ?>
        </header>
        <nav class="mui-bar mui-bar-tab">
            <a href="index.php" class="mui-tab-item mui-active">
                <span class="mui-icon mui-icon-home"></span>
                <span class="mui-tab-label">首页</span>
            </a>
            <a class="mui-tab-item">
                <span class="mui-icon mui-icon-phone"></span>
                <span class="mui-tab-label">电话</span>
            </a>
            <a class="mui-tab-item">
                <span class="mui-icon mui-icon-email"></span>
                <span class="mui-tab-label">邮件</span>
            </a>
            <a class="mui-tab-item">
                <span class="mui-icon mui-icon-gear"></span>
                <span class="mui-tab-label">设置</span>
            </a>
        </nav>
        <div class="mui-content mui-scroll-wrapper">
            <div class="mui-scroll">
                <!-- 主界面具体展示内容 -->
                <div class="mui-slider">
                    <div class="mui-slider-group mui-slider-loop">
                        <?php
                        $sql="select * from onesql.show WHERE id=47";
                        $result=$db->query($sql);
                        $row=$result->fetch_assoc();
                        ?>
                        <div class="mui-slider-item mui-slider-item-duplicate">
                            <a href="show.php?id=<?php echo $row['id']?>">
                                <img src="<?php echo $row['thumb']?>" />
                            </a>
                        </div>
                        <?php
                        $sql="select * from onesql.show WHERE positionid=2";
                        $result=$db->query($sql);
                        ?>
                        <?php while ($row=$result->fetch_assoc()):?>
                            <div class="mui-slider-item" >
                                <a href="show.php?id=<?php echo $row['id']?>">
                                    <img src="<?php echo $row['thumb']?>" />
                                </a>
                            </div>
                        <?php endwhile;?>
                        <?php
                        $sql="select * from onesql.show WHERE id=42";
                        $result=$db->query($sql);
                        $row=$result->fetch_assoc();
                        ?>
                        <div class="mui-slider-item mui-slider-item-duplicate">
                            <a href="show.php?id=<?php echo $row['id']?>">
                                <img src="<?php echo $row['thumb']?>" />
                            </a>
                        </div>
                    </div>
                </div>
                <!--新闻内容部分-->
                <div id="wrapper" >
                    <div id="scroller">
                        <ul class="mui-table-view">
                            <?php
                            $sql="select * from onesql.show";
                            $result=$db->query($sql);
                            ?>
                            <?php while($row=$result->fetch_assoc()):?>
                                <li class="mui-table-view-cell">
                                    <a href="show.php?id=<?php echo $row['id']?>">
                                        <div class="list">
                                            <div class="imgs" style="background-image:url('<?php echo $row['thumb']?>');background-size: cover"></div>
                                            <div class="wens">
                                                <p class="two" >[<?php echo $row['title']?>]</p>
                                                <span><?php echo $row['content']?></span>
                                            </div>
                                        </div>

                                    </a>
                                </li>
                            <?php endwhile;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mui-off-canvas-backdrop"></div>
    </div>
</div>
</body>
</html>
<script>
    var gallery = mui('.mui-slider');
    gallery.slider({
        interval:3000//自动轮播周期，若为0则不自动播放，默认为0；
    });
    mui('body').on('tap','a',function(){document.location.href=this.href;});
</script>






