<?php 
	session_start();
	require_once("../config.php");
	if(isset($_SESSION['stu_id'])) $id = $_SESSION['stu_id'];
	$qry = $pdo_conn->prepare("SELECT `first_login` FROM `student` WHERE `id` = '".$id."'");
	$qry->execute();
	$qry->setFetchMode(PDO::FETCH_ASSOC);
	foreach($qry->fetchAll() as $value) echo $value['first_login'];
?>