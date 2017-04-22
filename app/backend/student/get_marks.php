<?php  
	session_start();
	require_once("../config.php");
	if(isset($_SESSION['stu_id'])) $id = $_SESSION['stu_id'];
	$data = json_decode(file_get_contents("php://input"));
	$qry = $pdo_conn->prepare("SELECT * FROM `marks` INNER JOIN `subject` ON `marks`.`sub_id` = `subject`.`sub_id` WHERE `marks`.`student_id` = '".$id."' AND `marks`.`sem` = '".$data->sem."'");
	$qry->execute();
	$qry->setFetchMode(PDO::FETCH_ASSOC);
	$marks = [];
	foreach($qry->fetchAll() as $key => $value){
		$marks[$key]['sub_id'] = $value['sub_id'];
		$marks[$key]['sub_name'] = $value['sub_name'];
		$marks[$key]['internal_10'] = $value['internal_10'];
		$marks[$key]['internal_15'] = $value['internal_15'];
		$marks[$key]['total'] = $value['total'];
	}
	$json = json_encode($marks);
	echo $json;
?>