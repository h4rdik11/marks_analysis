<?php 
	session_start();
	require_once("../config.php");
	$data = json_decode(file_get_contents("php://input"));
	$emp = $_SESSION['emp_id'];
	$qry = $pdo_conn->prepare("UPDATE `teacher` SET `pwd` = '".$data->pass."', `first_login` = '0' WHERE `emp_id` = '".$emp."'");
	if($qry->execute()) echo "Password changed successfully.";
	else echo "Something went wrong. Please contact the developer.";
?>