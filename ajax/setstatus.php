<?php
session_start();
include_once('../xloop/mainclass.php');
$obj= new xloop();
$obj->setStatus($_SESSION['rm_user_id'], $_POST['bid'], $_POST['ts'], $_POST['tl']);    
$obj->addlog($_SESSION['rm_user_id'], $_POST['bid'],$_POST['ts']);

if($_POST['bid'] == 1){
    $obj->resetall($_SESSION['rm_user_id']);
}
//echo "done";
?>