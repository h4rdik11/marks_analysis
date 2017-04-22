<?php
	session_start();
	if(isset($_SESSION['emp_id'])){
		require_once("../config.php");
		
		$emp = $_SESSION['emp_id'];
		$course = $pdo_conn->prepare("SELECT `course` FROM `subject`  WHERE `empid` = '".$emp."' GROUP BY `course`");
		//$course->bindParam(":emp", $emp);
		$course->execute();
		$course_result = $course->setFetchMode(PDO::FETCH_ASSOC);
		$c = [];
		foreach($row = $course->fetchAll() as $value){
			$c[] = $value['course'];
		}
		
		$vals = [];
		foreach($c as $course_key =>  ){
			$stmn = $pdo_conn->prepare("SELECT * FROM `subject` WHERE `course` = '".$course."' AND `empid` = '".$emp."'");
			$stmn->execute();
			$result = $stmn->setFetchMode(PDO::FETCH_ASSOC);
			foreach($row = $stmn->fetchAll() as  $key =>  $value){
				
				$marks_avail = 0;
				$marks = $pdo_conn->prepare("SELECT * FROM `marks` WHERE `sub_id` = '".$value['sub_id']."' AND `teacher_id` = '".$emp."'");
				$final = $pdo_conn->prepare("SELECT SUM(`final`) AS `final` FROM `marks` WHERE `sub_id` = '".$value['sub_id']."' AND `teacher_id` = '".$emp."'");
				$marks->execute();
				$final->execute();
				$res = $marks->rowCount();
				$res2 = $final->fetch(PDO::FETCH_NUM);
				$final_edit = 0;
				if($res2[0] > 0 ) $final_edit = 1;
				$marks_avail = 0;
				if($res > 0) $marks_avail = 1; 
				
				$vals[$course_key]['course'] = $course;
				$vals[$course_key]['subject'][$key]['marks_avail'] = $marks_avail;
				$vals[$course_key]['subject'][$key]['sub_id'] = $value['sub_id'];
				$vals[$course_key]['subject'][$key]['name'] = $value['sub_name'];
				$vals[$course_key]['subject'][$key]['course'] = $value['course'];
				$vals[$course_key]['subject'][$key]['sem'] = $value['sem'];
				$vals[$course_key]['subject'][$key]['final'] = $final_edit;
	
			}
		}
		header("Content-type: application/json");
		$json = json_encode($vals);
		echo $json;
	}
?>