<?php
	session_start();
	require_once("../config.php");
	$data = json_decode(file_get_contents("php://input"));
	$vals = [];
	foreach ($data as $key => $value) {
		$vals[$key] = $value;
	}
	$query = $pdo_conn->prepare("DELETE FROM `course` WHERE `course_code` = '".$vals['code']."'") or die(mysql_error());
	if($query->execute()) echo "Course deleted successfully !!";
	else echo "Something went wrong. Please contact the developer !!";
?>