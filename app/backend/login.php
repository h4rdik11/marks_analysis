<?php
	require_once("config.php");
	$data = json_decode(file_get_contents("php://input"));
	
	if($data->type == "teacher"){
		$stmn = $pdo_conn->prepare("SELECT * FROM `teacher` WHERE `emp_id` = '".$data->id."' OR `emailid` = '".$data->id."' OR `phone` = '".$data->id."' ");
		$stmn->execute();
		if($stmn->rowCount() > 0){
			$log = $pdo_conn->prepare("SELECT * FROM `teacher` WHERE  `pwd` = '".$data->password."' AND (`emp_id` = '".$data->id."' OR `emailid` = '".$data->id."' OR `phone` = '".$data->id."')");
			$log->execute();
			if($log->rowCount() > 0){
				$log->setFetchMode(PDO::FETCH_ASSOC);
				foreach($log->fetchAll() as $value){
					session_start();
					$_SESSION['type'] = $data->type;
					$_SESSION['emp_id'] = $value['emp_id'];
					$_SESSION['name'] = $value['firstname']." ".$value['lastname'];
					echo "success";
				}
			}else echo "password_error";
		}else echo "uid_error";
	}
	if($data->type == "admin"){
		$stmn = $pdo_conn->prepare("SELECT * FROM `admin` WHERE `emp_id` = '".$data->id."' OR `emailid` = '".$data->id."' OR `phone` = '".$data->id."' ");
		$stmn->execute();
		if($stmn->rowCount() > 0){
			$log = $pdo_conn->prepare("SELECT * FROM `admin` WHERE  `pwd` = '".$data->password."' AND (`emp_id` = '".$data->id."' OR `emailid` = '".$data->id."' OR `phone` = '".$data->id."')");
			$log->execute();
			if($log->rowCount() > 0){
				$result = $log->setFetchMode(PDO::FETCH_ASSOC);
				foreach($row = $log->fetchAll() as $value){
					session_start();
					$_SESSION['type'] = $data->type;
					$_SESSION['emp_id'] = $value['emp_id'];
					$_SESSION['name'] = $value['firstname']." ".$value['lastname'];
					echo "success";
				}
			}else echo "password_error";
		}else echo "uid_error";
	}
	if($data->type == "student"){
		$stmn = $pdo_conn->prepare("SELECT * FROM `student` WHERE `id` = '".$data->id."' OR `email` = '".$data->id."' OR `contact` = '".$data->id."' ");
		$stmn->execute();
		if($stmn->rowCount() > 0){
			$log = $pdo_conn->prepare("SELECT * FROM `student` WHERE  `password` = '".$data->password."' AND (`id` = '".$data->id."' OR `email` = '".$data->id."' OR `contact` = '".$data->id."')");
			$log->execute();
			if($log->rowCount() > 0){
				$result = $log->setFetchMode(PDO::FETCH_ASSOC);
				foreach($row = $log->fetchAll() as $value){
					session_start();
					$_SESSION['type'] = $data->type;
					$_SESSION['stu_id'] = $value['id'];
					$_SESSION['name'] = $value['fname']." ".$value['lname'];
					echo "success";
				}
			}else echo "password_error";
		}else echo "uid_error";
	}
?>