<?php 
	session_start();
	require_once("../config.php");
	$data = json_decode(file_get_contents("php://input"));
	$id = $_SESSION['stu_id'];
	$qry = $pdo_conn->prepare("UPDATE `student` SET `password` = '".$data->pass."', `first_login` = '0' WHERE `id` = '".$id."'");
	if($qry->execute()) echo "Password changed successfully.";
	else echo "Something went wrong. PLease contact the developer.";
?>