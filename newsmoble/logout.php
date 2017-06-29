<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/19
 * Time: 18:04
 */


session_start();
if ($_SESSION['agian']){
    foreach ($_SESSION as $k=>$v){
        unset($_SESSION[$k]);
    }
    echo "<script>alert('退出成功');location.href='index.php';</script>";
}else{
    echo "<script>alert('请登录');location.href='admin.php';</script>";
}
