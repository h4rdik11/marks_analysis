<?php 
	session_start();
	require_once("../config.php");
	if(isset($_SESSION['emp_id'])) $emp_id = $_SESSION['emp_id'];
	$qry = $pdo_conn->prepare("SELECT `first_login` FROM `teacher` WHERE `emp_id` = '".$emp_id."'");
	$qry->execute();
	$qry->setFetchMode(PDO::FETCH_ASSOC);
	foreach($qry->fetchAll() as $value) echo $value['first_login'];
?>