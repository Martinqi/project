<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/19
 * Time: 11:53
 */

session_start();
if(!isset($_SESSION["memberlogin"])){
    echo "<script>alert('请登陆');location.href='admin.php'</script>";
    exit();
}
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
    <h1 class="mui-title">个人中心</h1>
   	<a class="mui-icon mui-icon-left-nav mui-pull-left" href="list.php"></a>
</header>
<ul class="mui-table-view" style="margin-top: 44px">
    <li class="mui-table-view-cell">
        <a class="mui-navigate-right" href="editpass.php">
            修改密码
        </a>
    </li>
    <li class="mui-table-view-cell">
        <a class="mui-navigate-right" href="changename.php">
            修改昵称
        </a>
    </li>
    <li class="mui-table-view-cell">
        <a class="mui-navigate-right">
            上传头像
        </a>
    </li> <li class="mui-table-view-cell">
        <a class="mui-navigate-right" href="lookmessage.php">
            查看留言
        </a>
    </li> <li class="mui-table-view-cell">
        <a class="mui-navigate-right">
            查看被留言
        </a>
    </li>
</ul>

</body>
</html>

