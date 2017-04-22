<?php
	session_start();
	require_once("../config.php");
	$query = $pdo_conn->prepare("SELECT * FROM `teacher`");
	$query->execute();
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$data = [];
	foreach($row = $query->fetchAll() as $value){
		$data[] = array(
			'sno'	=> $value['sno'],
			'fname' => $value['firstname'],
			'lname' => $value['lastname'],
			'empid' => $value['emp_id'],
			'dept' => $value['dept'],
			'contact' => $value['phone'],
			'email' => $value['emailid'],
			'pass' => $value['pwd'],
			'desig' => $value['designation']
		);	
	}
	$json = json_encode($data);
	echo $json;
?>