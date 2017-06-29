<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link href="css/mui.min.css" rel="stylesheet"/>
</head>
<style>
    .mui-input-group{
        margin-top: 44px;
    }
</style>
<body>
	<header class="mui-bar mui-bar-nav">
	    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="member.php"></a>
	    <h1 class="mui-title">修改昵称</h1>
	</header>
	<form class="mui-input-group" action="addchangename.php">
	    <div class="mui-input-row">
	        <label>昵称</label>
	        <input name="nicheng" type="text" class="mui-input-clear" placeholder="昵称">
	    </div>
        <div class="mui-content-padded">
            <button style="height: auto;padding: 6px 0" type="submit" id='login' class="mui-btn mui-btn-block mui-btn-primary">提交</button>
        </div>
	</form>
</body>
</html>