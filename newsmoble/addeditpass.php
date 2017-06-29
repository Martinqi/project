<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/19
 * Time: 21:30
 */
session_start();
include "public.php";
$opass=$_REQUEST['opass'];
$npass=$_REQUEST['npass'];
$qpass=$_REQUEST['qpass'];
$name=$_SESSION['name'];
$sql="select * from member WHERE name='$name'";
$result=$db->query($sql);
$row=$result->fetch_assoc();
if ($row){
    if ($row['pass']==$opass){
        if ($npass==$qpass){
            $sql="update member set pass='$npass' WHERE name='$name'";
            $result=$db->query($sql);
            if ($result){
                foreach ($_SESSION as $k=>$v){
                    unset($_SESSION[$k]);
                }
                echo "<script>alert('修改成功，重新登陆');location.href='admin.php'</script>";
            }
        }else{
            echo "<script>alert('两次密码输入不一致');location.href='editpass.php'</script>";
        }
    }else{
        echo "<script>alert('原密码错误');location.href='editpass.php'</script>";
    }
} else{
    echo "<script>alert('修改失败');location.href='editpass.php'</script>";
}
