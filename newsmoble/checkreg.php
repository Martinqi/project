<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/16
 * Time: 11:06
 */
include "public.php";
include "public.php";
$name=$_REQUEST['name'];
$pass=$_REQUEST['pass'];
$qpass=$_REQUEST['qpass'];
$email=$_REQUEST['email'];
$sql="select name from member WHERE name='$name'";
$result=$db->query($sql);
$row=$result->fetch_assoc();
if ($row){
    echo "<script>alert('用户名已存在');location.href='reg.php'</script>";
    exit();
}
$sql="insert into member (name,pass,email) VALUES ('$name',$pass,'$email')";
$result=$db->query($sql);
if ($db->affected_rows>0){
    echo "<script>alert('注册成功');location.href='admin.php'</script>";
}
