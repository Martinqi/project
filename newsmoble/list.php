<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/19
 * Time: 8:47
 */
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link href="css/mui.min.css" rel="stylesheet"/>
    <script src="js/mui.min.js"></script>
    <script type="text/javascript" charset="utf-8">
        mui.init();
    </script>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
		<a class=" mui-icon mui-icon-left-nav mui-pull-left" href="index.php"></a>
	    <h1 class="mui-title">标题</h1>
	
	</header>
	<ul class="mui-table-view" style="margin-top: 44px">
        <li class="mui-table-view-cell">
            <a class="mui-navigate-right" href="member.php">
                个人中心
            </a>
        </li>
        <li class="mui-table-view-cell">
            <a class="mui-navigate-right">
                上换头像
            </a>
        </li>
        <li class="mui-table-view-cell">
            <a class="mui-navigate-right" href="logout.php">
                 退出登录
            </a>
        </li>
    </ul>
    <nav class="mui-bar mui-bar-tab">
        <a  class="mui-tab-item" href="index.php">
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
        <a class="mui-tab-item mui-active" href="list.php" >
            <span class="mui-icon mui-icon-gear"></span>
            <span class="mui-tab-label">设置</span>
        </a>
    </nav>
</body>
</html>
<script>
	mui('body').on('tap','a',function(){document.location.href=this.href;});
</script>