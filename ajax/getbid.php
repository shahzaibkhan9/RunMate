<?php
session_start();
include_once('../xloop/mainclass.php');
$obj= new xloop();
$qa = $obj->getbaseactivity($_GET['wid'],$_GET['did'],$_GET['acid']);
echo $qa['bid'];
?>