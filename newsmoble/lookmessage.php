<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/23
 * Time: 14:12
 */
session_start();
$name=$_SESSION['name'];
include "public.php";
$sql="select * from message WHERE name='$name'";
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
    <link href="css/mui.min.css" rel="stylesheet"/>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
	    <a class="mui-icon mui-icon-left-nav mui-pull-left" href="member.php"></a>
	    <h1 class="mui-title">标题</h1>
	</header>
	<ul style="margin-top: 45px" class="mui-table-view">
		<?php while ($row=$result->fetch_assoc()):?>
	        <li class="mui-table-view-cell">
	            <?php echo $row['content']?>
	        </li>
	    <?php endwhile;?>
	</ul>
</body>
</html>

