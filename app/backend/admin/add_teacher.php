<?php
	session_start();
	require_once("../config.php");
	$data = json_decode(file_get_contents("php://input"));
	$vals =[];
	foreach($data as $key => $value){
		$vals[$key] = $value;
	}

	$if_exists = $pdo_conn->prepare("SELECT * FROM `teacher` WHERE `emp_id` = '".$vals['eid']."'");
	$if_exists->execute();
	if($if_exists->rowCount() > 0) echo "Teacher already exists. Please try again with a different Employee ID.";
	else{
		$pass = $vals['fname'].substr($vals['contact'],6);
		$query = $pdo_conn->prepare("INSERT INTO `teacher`(`firstname`,`lastname`,`emp_id`,`dept`,`phone`,`emailid`,`pwd`,`designation`) VALUES(
			'".$vals['fname']."',
			'".$vals['lname']."',
			'".$vals['eid']."',
			'".$vals['dept']."',
			'".$vals['contact']."',
			'".$vals['email']."',
			'".$pass."',
			'".$vals['desig']."')");
		if($query->execute()) echo "Teacher successfully added !!";
		else "Something went wrong. Please contact the developer !!";
	}
?>