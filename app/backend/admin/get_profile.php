<?php 
	session_start();
	require_once("../config.php");
	if(isset($_SESSION['emp_id'])) $id = $_SESSION['emp_id'];
	$qry = $pdo_conn->prepare("SELECT * FROM `admin` WHERE `emp_id` = '".$id."'");
	$qry->execute();
	$qry->setFetchMode(PDO::FETCH_ASSOC);
	foreach($qry->fetchAll() as $value){
		$data['fname'] = $value['firstname'];
		$data['lname'] = $value['lastname'];
		$data['contact'] = $value['phone'];
		$data['email'] = $value['emailid'];
	}
	$json = json_encode($data);
	echo $json;
?>