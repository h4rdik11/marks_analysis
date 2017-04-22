<?php
	session_start();
	if(isset($_SESSION['emp_id'])){
		require_once("../config.php");
		$data = json_decode(file_get_contents("php://input"));
		$success = false;
		$emp = $_SESSION['emp_id'];
		foreach($data as $d){
			$stmn = $pdo_conn->prepare("INSERT INTO `marks`(`student_id`,`teacher_id`,`sub_id`,`internal_10`,`internal_15`,`total`,`sem`) VALUES(:student_id,:teacher_id,:sub_id,:internal_10,:internal_15,:total,:sem)");
			$stmn->bindParam(":student_id",$d->student_id);
			$stmn->bindParam(":teacher_id",$emp);
			$stmn->bindParam(":sub_id",$d->sub_id);
			$stmn->bindParam(":internal_10",$d->internal_10);
			$stmn->bindParam(":internal_15",$d->internal_15);
			$stmn->bindParam(":total",$d->total);
			$stmn->bindParam(":sem",$d->sem);
			if($stmn->execute()) $success = true;
			else $success = false;
		}
		if($success) echo "Marks uploaded successfully !!";
		else echo "Something went wrong. Please contact the developer !!";
	}
?>