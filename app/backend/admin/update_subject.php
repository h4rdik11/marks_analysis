<?php
	session_start();
	require_once('../config.php');
	$data = json_decode(file_get_contents("php://input"));
	$vals = [];
	foreach($data as $key => $value){
		$vals[$key] = $value;
	}

	$query = $pdo_conn->prepare("UPDATE `subject` SET 
		`sub_name` = '".$vals['name']."',
		`course` = '".$vals['course']."',
		`sem` = '".$vals['sem']."',
		`empid` = '".$vals['teacher']."',
		`sub_credit` = '".$vals['credit']."'
		WHERE `sub_id` = '".$vals['code']."'");
	if($query->execute()) echo "Subject updated successfully !!";
	else echo "Somthing went wrong. Please contact the developer !!";
?>