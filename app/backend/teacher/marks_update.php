<?php
	session_start();
	if(isset($_SESSION['emp_id'])){
		require_once("../config.php");
		$emp = $_SESSION['emp_id'];
		$data = json_decode(file_get_contents("php://input"));
		$success = false;
		for($i = 0; $i<count($data); $i++){
			$stmn = $pdo_conn->prepare("UPDATE `marks` SET
				`internal_10` = '".$data[$i]->internal_10."',
				`internal_15` = '".$data[$i]->internal_15."',
				`total`       = '".$data[$i]->total."',
				`final`		  = 1
				WHERE `student_id` = '".$data[$i]->student_id."' AND `sub_id` = '".$data[$i]->sub_id."' AND `teacher_id` = '".$emp."'
			");
			if($stmn->execute()) $success = true;
			else $success = false;
		}
		if($success) echo "Marks updated successfully !!";
		else echo "Something went wrong. Please contact the developer !!";
	}
?>