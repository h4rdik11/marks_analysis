<?php
	session_start();
	if(isset($_SESSION['emp_id'])){
		require_once("../config.php");
		$data = json_decode(file_get_contents("php://input"));
		$vals = [];
		foreach($data as $key => $value) $vals[$key] = $value;
		$stmn = $pdo_conn->prepare("SELECT `id`, `fname`, `lname` FROM `student` WHERE `course` = '".$vals['course']."' AND `sem` = '".$vals['sem']."'");
		$stmn->execute();
		$result = $stmn->setFetchMode(PDO::FETCH_ASSOC);
		$students = [];
		foreach($row = $stmn->fetchAll() as $key => $value){
			$students[$key] = $value;
		}
		$json = json_encode($students);
		echo $json;
	}
?>