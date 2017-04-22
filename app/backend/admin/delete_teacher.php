<?php
	session_start();
	require_once("../config.php");
	$data = json_decode(file_get_contents("php://input"));
	$vals = [];
	foreach($data as $key => $value) $vals[$key] = $value;
	$query = $pdo_conn->prepare("DELETE FROM `teacher` WHERE `emp_id` = '".$vals['id']."'");
	if($query->execute()) echo "Teacher deleted successfully !!";
	else "Something went wrong. Please contact the developer !!"
?>