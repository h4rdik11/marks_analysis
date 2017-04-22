<?php 
	session_start();
	if(isset($_SESSION['emp_id'])){
		require_once("../config.php");
		$data = json_decode(file_get_contents("php://input"));
		$emp = $_SESSION['emp_id'];
		$qry1 = $pdo_conn->prepare("SELECT `marks`.`student_id`, `marks`.`teacher_id`,`marks`.`sub_id`, `marks`.`internal_10`,`marks`.`internal_15`, `marks`.`total`, `student`.`fname`, `student`.`lname` FROM `marks` LEFT JOIN `student` ON `marks`.`student_id` = `student`.`id` WHERE `marks`.`teacher_id` = '".$emp."' AND `marks`.`sub_id` = '".$data->sub_id."'");
		$qry1->execute();
		$marks_details = [];
		$result = $qry1->setFetchMode(PDO::FETCH_ASSOC);
		foreach($row = $qry1->fetchAll() as $key => $value){
			$marks_details[$key] = $value;
		}
		$json = json_encode($marks_details);
		echo $json;
	}
?>