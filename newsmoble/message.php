<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/21
 * Time: 18:43
 */
session_start();
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
    <script src="js/jquery.min.js"></script>
</head>
<style>
    body{
        padding: 0 10px;
    }
</style>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="show.php?id=<?php echo $id?>"></a>
    <h1 class="mui-title">评论</h1>
</header>
<form action="">
    <textarea name="text" style="width: 100%;height: 150px;resize:none;margin-top: 48px">
    </textarea>
    <div id='reg' pid="<?php echo $id?>" name="<?php echo $_SESSION['name']?>" style="height: 40px;line-height: 10px" class="mui-btn mui-btn-block mui-btn-primary">提交</div>
</form>
</body>
</html>
<script>
    $("#reg").click(function() {
        let pid = $(this).attr("pid");
        let name = $(this).attr("name");
        let text = $("textarea").val();
        if (text.replace(/\s/g,"").length==0){
            alert("请输入内容")
        }else {
            $.ajax({
                url: "messageinfo.php",
                type: "post",
                data: {
                    pid: pid, name: name, text: text,
                },
                success: function (e) {
                    if (e =="ok") {
                        $("textarea").val("");
                        alert("评论成功");
                        location.href=`show.php?id=${pid}`;
                    }
                }
            })
        }

    })
</script>