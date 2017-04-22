<?php
	session_start();
	require_once("../config.php");
	$data = json_decode(file_get_contents("php://input"));
	$vals = [];
	foreach($data as $key => $value) $vals[$key] = $value;
	$query = $pdo_conn->prepare("DELETE FROM `student` WHERE `id` = '".$vals['roll']."'") or die(mysql_error());
	if($query->execute()) echo "Student deleted successfully !!";
	else "Something went wrong. Plese contact the developer !!";
?>