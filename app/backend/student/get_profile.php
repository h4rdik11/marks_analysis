<?php 
	session_start();
	require_once("../config.php");
	if(isset($_SESSION['stu_id'])) $id = $_SESSION['stu_id'];
	$qry = $pdo_conn->prepare("SELECT * FROM `student` WHERE `id` = '".$id."'");
	$qry->execute();
	$qry->setFetchMode(PDO::FETCH_ASSOC);
	foreach($qry->fetchAll() as $value){
		$data['fname'] = $value['fname'];
		$data['lname'] = $value['lname'];
		$data['contact'] = $value['contact'];
		$data['gender'] = $value['gender'];
		$data['email'] = $value['email'];
		$data['address'] = $value['address'];
	}
	$json = json_encode($data);
	echo $json;
?>