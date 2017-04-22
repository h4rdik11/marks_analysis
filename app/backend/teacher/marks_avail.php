<?php
	require_once("../config.php");

	$val = json_decode(file_get_contents("php://input"));
	// $stmn = $pdo_conn->prepare("SELECT * FROM `marks` WHERE `sub_id` = '".$val->sub_id."'");
	// $result = $stmn->execute();
	// echo $stmn->rowCount();	

	echo $val->sub_id;

?>