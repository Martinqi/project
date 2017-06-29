<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/16
 * Time: 15:09
 */
include "public.php";
    function checkname($db)
    {
        $name = $_REQUEST['name'];
        $sql = "select name from member";
        $result = $db->query($sql);
        while ($row = $result->fetch_assoc()) {
            if ($row['name'] == $name) {
                echo 'error';
                exit;
            }
        }
        echo 'true';
    }
checkname($db);
