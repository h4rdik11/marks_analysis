<?php
	session_start();
	require_once("../config.php");
	$data = json_decode(file_get_contents("php://input"));
	$query = $pdo_conn->prepare("SELECT * FROM `subject` WHERE `course` = '".$data->course."' AND `sem` = '".$data->sem."'");
	$query->execute();
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$data = [];
	$teacher_name = "";
	foreach($row = $query->fetchAll() as $value){
		$teacher_qry = $pdo_conn->prepare("SELECT `firstname`,`lastname` FROM `teacher` WHERE `emp_id` = '".$value['empid']."'");
		$teacher_qry->execute();
		if($teacher_qry->rowCount() == 0) $teacher_name = " ";
		else{
			$teacher_qry->setFetchMode(PDO::FETCH_ASSOC);
			foreach($res = $teacher_qry->fetchAll() as $val){
				$teacher_name = $val['firstname']." ".$val['lastname'];
			}
		}
		$data[] = array(
			'id'	=> $value['sub_id'],
			'name' => $value['sub_name'],
			'course' => $value['course'],
			'sem' => $value['sem'],
			'teacher' => $value['empid'],
			'teacher_name' => $teacher_name,
			'credit' => $value['sub_credit']
		);	
	}
	$json = json_encode($data);
	echo $json;
?>