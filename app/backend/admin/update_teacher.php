<?php
	session_start();
	require_once("../config.php");
	$data = json_decode(file_get_contents("php://input"));
	$vals = [];
	foreach($data as $key => $value){
		$vals[$key] = $value;
	}
	$query = $pdo_conn->prepare("UPDATE `teacher` SET 
		`firstname` = '".$vals['fname']."',
		`lastname` = '".$vals['lname']."',
		`dept` = '".$vals['dept']."',
		`phone` = '".$vals['contact']."',
		`emailid` = '".$vals['email']."',
		`designation` = '".$vals['desig']."'
	WHERE `emp_id` = '".$vals['eid']."'");
	if($query->execute()) echo "Teacher updated successfully !!";
	else echo "Something went wrong. Please contact the developer !!"
?>