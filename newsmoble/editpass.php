<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/19
 * Time: 18:44
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
    <link href="css/validate.css" rel="stylesheet" />
    <script src="js/mui.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
	    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="member.php"></a>
	    <h1 class="mui-title">修改密码</h1>
	</header>
	<form id="signupForm" action="addeditpass.php" class="mui-input-group" style="margin-top: 46px" >
    <div class="mui-input-row">
        <label>原密码</label>
        <input id='account' name="opass" type="text" class="mui-input-clear">
    </div><div class="mui-input-row">
        <label>新密码</label>
        <input id='password1' name="npass" type="password" class="mui-input-clear" >
    </div><div class="mui-input-row">
        <label>确认密码</label>
        <input id='password_confirm' name="qpass" type="password" class="mui-input-clear" >
    </div>
        <div class="mui-content-padded">
            <button style="height: auto;padding: 6px 0" type="submit" id='login' class="mui-btn mui-btn-block mui-btn-primary">提交</button>
        </div>
    </form>
</body>
</html>
<script>
    $("#signupForm").validate({
        rules: {
            opass: {
                required: true,
            },
            npass: {
                required: true,
                minlength: 6
            },
            qpass: {
                required: true,
                minlength: 6,
                equalTo: "#password1"
            }
        },
        messages: {
           opass: {
                required: "请输入原密码",
                minlength: "用户名长度最少6位",
            },
            npass: {
                required: "请输入新密码",
                minlength: "密码长度最少6位"
            },
            qpass: {
                required: "确认密码",
                minlength: "密码不能少于6位",
                equalTo: "两次密码要一致"
            }
        },
    });
</script>