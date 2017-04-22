<?php
	session_start();
	require_once("../config.php");
	$limit = 10;
	$offset = 0;
	$query = $pdo_conn->prepare("SELECT * FROM `course` LIMIT ".$limit."");
	$query->execute();
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$data = [];
	foreach($row = $query->fetchAll() as $value){
		$data[] = array(
			'code'	=> $value['course_code'],
			'name' => $value['course_name'],
			'duration' => $value['duration']
		);	
	}
	$json = json_encode($data);
	echo $json;
?>