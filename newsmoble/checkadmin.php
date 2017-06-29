<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/16
 * Time: 17:46
 */
session_start();

if(isset($_SESSION["agian"])){
    echo "<script>location.href='index.php'</script>";
    exit();
}
include "public.php";
$name=$_REQUEST['name'];
$pass=$_REQUEST['pass'];
$sql="select * from member WHERE name='$name'";
$result=$db->query($sql);
$row=$result->fetch_assoc();
if ($row){
    if ($row['pass']==$pass){
        $_SESSION["memberlogin"]="yes";
        $_SESSION["agian"]="yes";
        $_SESSION['name']=$name;
        $_SESSION['pass']=$pass;
        if(isset($_SESSION["url"])){
            $url=$_SESSION["url"];
        }else{
            $url="index.php";
        }
        echo "<script>alert('登陆成功');location.href='{$url}'</script>";
        exit();
    }else{
        echo "<script>alert('登录失败，密码错误');location.href='admin.php'</script>";
    }
}else{
    echo "<script>alert('登录失败，账号不存在');location.href='admin.php'</script>";
}

