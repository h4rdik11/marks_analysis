<?php
	session_start();
	require_once("../config.php");
	$limit = 10;
	$query = $pdo_conn->prepare("SELECT * FROM `student`");
	$query->execute();
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$data = [];
	foreach($row = $query->fetchAll() as $value){
		$data[] = array(
			"sno" => $value['sno'],
			"roll" => $value['id'],
			"fname" => $value['fname'],
			"lname" => $value['lname'],
			"sem" => $value['sem'],
			"course" => $value['course'],
			"batch" => $value['batch'],
			"contact" => $value['contact'],
			"gender" => $value['gender'],
			"email" => $value['email'],
			"address" => $value['address']
		);
	}
	$json = json_encode($data);
	echo $json;
?>