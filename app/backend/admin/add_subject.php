<?php
	session_start();
	require_once('../config.php');
	$data = json_decode(file_get_contents("php://input"));
	$vals = [];
	foreach($data as $key => $value){
		$vals[$key] = $value;
	}

	$if_exists = $pdo_conn->prepare("SELECT * FROM `subject` WHERE `sub_id` = '".$vals['code']."'");
	$if_exists->execute();
	if($if_exists->rowCount() > 0) echo "Subject already Added." ;
	else{
		$query = $pdo_conn->prepare("INSERT INTO `subject`(`sub_id`,`sub_name`,`course`,`sem`,`sub_credit`) VALUES(
			'".$vals['code']."',
			'".$vals['name']."',
			'".$vals['course']."',
			'".$vals['sem']."',
			'".$vals['credit']."'
		)");
		if($query->execute()) echo "Subject added successfully !!";
		else echo "Somthing went wrong. Please contact the developer !!";
	}
?>