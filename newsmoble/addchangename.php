<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/21
 * Time: 9:13
 */
session_start();
include "public.php";
$name=$_REQUEST['nicheng'];
$yname=$_SESSION['name'];
$sql="update member set name='$name' WHERE name='$yname'";
$result=$db->query($sql);
if ($result){
    echo "<script>alert('修改成功');location.href='index.php'</script>";
    $_SESSION["name"]=$name;
}else{
    echo "<script>alert('修改失败');location.href='changename.php'</script>";
}
