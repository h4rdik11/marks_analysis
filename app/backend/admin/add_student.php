<?php 
	session_start();
	require_once("../config.php");
	$data = json_decode(file_get_contents("php://input"));
	$vals =[];
	$vals['lname'] = "";
	foreach($data as $key => $value){
		$vals[$key] = $value;
	}
	$if_exists = $pdo_conn->prepare("SELECT * FROM `student` WHERE `id` = '".$vals['roll']."'");
	$if_exists->execute();
	if($if_exists->rowCount() > 0) echo "Student already exists.";
	else{
		$pass = $vals['fname'].substr($vals['contact'],6);
		$query = $pdo_conn->prepare("INSERT INTO `student`(`id`,`fname`,`lname`,`sem`,`course`,`batch`,`contact`,`gender`,`email`,`address`,`password`) VALUES(
			'".$vals['roll']."',
			'".$vals['fname']."',
			'".$vals['lname']."',
			'".$vals['sem']."',
			'".$vals['course']."',
			'".$vals['batch']."',
			'".$vals['contact']."',
			'".$vals['gender']."',
			'".$vals['email']."',
			'".$vals['address']."',
			'".$pass."')");
		if($query->execute()) echo "Student added successfully !!";
		else "Something went wrong. Please contact the developer !!";
	}
?>