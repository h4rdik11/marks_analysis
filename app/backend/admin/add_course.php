<?php
	session_start();
	require_once('../config.php');
	$data = json_decode(file_get_contents("php://input"));
	$vals = [];
	foreach($data as $key => $value){
		$vals[$key] = $value;
	}
	$if_exists = $pdo_conn->prepare("SELECT * FROM `course` WHERE `course_code` = '".$vals['code']."'");
	$if_exists->execute();
	if($if_exists->rowCount() > 0) echo "Course already Added." ;
	else{
		$query = $pdo_conn->prepare("INSERT INTO `course`(`course_code`,`course_name`,`duration`) VALUES(
			'".$vals['code']."',
			'".$vals['name']."',
			'".$vals['duration']."'
		)");
		if($query->execute()) echo "Course added successfully !!";
		else echo "Somthing went wrong. Please contact the developer !!";
	}
?>