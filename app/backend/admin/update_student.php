<?php
	session_start();
	require_once("../config.php");
	$data = json_decode(file_get_contents("php://input"));
	$vals = [];
	foreach($data as $key => $value){
		$vals[$key] = $value;
	}
	$query = $pdo_conn->prepare("UPDATE `student` SET
		`fname` = '".$vals['fname']."',
		`lname` = '".$vals['lname']."',
		`sem` = '".$vals['sem']."',
		`course` = '".$vals['course']."',
		`batch`	= '".$vals['batch']."',
		`contact` = '".$vals['contact']."',
		`gender` = '".$vals['gender']."',
		`email`	= '".$vals['email']."',
		`address` = '".$vals['address']."'
	 WHERE `id` = '".$vals['roll']."'");
	if($query->execute()) echo "Student updated successfully !!";
	else echo "Something went wrong. Please contact the developer !!";
?>