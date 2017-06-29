<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/15
 * Time: 16:40
 */
include "public.php";
$id=$_REQUEST['id'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/index.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/mui.js"></script>
</head>
<style>
	.active{
		display: none;
	}
</style>
<body>
	<header class="mui-bar mui-bar-nav">
	    <a class=" mui-icon mui-icon-left-nav mui-pull-left" href="index.php"></a>
	    <h1 class="mui-title">新闻详情</h1>
	    <a href="message.php?id=<?php echo $id?>" class="mui-icon mui-icon-compose  mui-pull-right"></a>
	</header>
<div class="box" style="width: 100%;">
    <?php
    $sql="select * from onesql.show WHERE id=$id";
    $result=$db->query($sql);
    ?>
    <?php while ($row=$result->fetch_assoc()):?>
        <div class="show">
            <p class="biaoti"><?php echo $row['title']?></p>
            <p class="time"><?php echo $row['time']?></p>
            <div class="thumb" style="background-image: url('<?php echo $row['thumb']?>');background-size: cover"></div>
            <p class="xiangqing">
                <?php echo $row['content']?>
            </p>
        </div>
    <?php endwhile;?>
    	<div class="mui-input-row">
    	    <label>评论</label>
    	    <div class="mui-switch mui-active mui-switch-blue">
    	        <div class="mui-switch-handle"></div>
    	    </div>
    	</div>
   <ul id="mess" class="mui-table-view">
       <?php
           $sql="select * from message WHERE pid=$id";
           $result=$db->query($sql);
       ?>
       <?php while ($row=$result->fetch_assoc()):?>
           <li class="mui-table-view-cell">
               <span style="margin-right: 15px;color: #777777;"><?php echo $row['name']?></span>
               <span style="color: #777;"><?php echo $row['time']?></span><br/>
               <span style="font-size: 20px;line-height: 28px;"><?php echo $row['content']?></span>
           </li>
       <?php endwhile;?>
      </ul> 	
</div>
</body>
</html>
<script>
    $('.mui-switch-blue').click(function(){
    	$('#mess').toggleClass('active')
    });
</script>
 
