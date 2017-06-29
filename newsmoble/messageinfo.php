<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/23
 * Time: 9:35
 */
session_start();
if(!isset($_SESSION["memberlogin"])){
    echo "<script>alert('请登陆');location.href='admin.php'</script>";
    exit();
}
$name=$_SESSION['name'];
$pid=$_REQUEST['pid'];
$text=$_REQUEST['text'];
include "public.php";
$sql="insert into message (name,content,pid) VALUES ('$name','$text',$pid)";
$result=$db->query($sql);
if ($result){
   echo "ok";
}

