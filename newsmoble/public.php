<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/9
 * Time: 15:33
 */
header("Content-Type:text/html;charset=utf8");
$db=new mysqli('localhost','root','','onesql');
$db->query ('set names utf8');
