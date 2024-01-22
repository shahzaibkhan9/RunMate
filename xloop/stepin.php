<?php
session_start();
include_once('mainclass.php');
$obj = new xloop();
$q = $obj->getUserData($main_user_id);
$obj->addnewuserlog($main_user_id);
mysqli_num_rows($q) <= 0 ? die("No Record Found") : '';
foreach($q as $a){
	// echo "<pre>";
	// print_r($a);
	$_SESSION["rm_user_id"] = $a['userid'];
	$_SESSION["rm_user_name"] = $a['username'];
	$_SESSION["rm_full_name"] = $a['full_name'];
	$_SESSION["rm_base_id"] = $a['bid'];
	$_SESSION["rm_user_weight"] = $a['weight'];
	// echo "</pre>";
}
?>