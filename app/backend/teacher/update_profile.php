<?php  
	session_start();
	require_once("../config.php");
	if(isset($_SESSION['emp_id'])) $id = $_SESSION['emp_id'];
	$data = json_decode(file_get_contents("php://input"));
	if(isset($data->new_pass) && isset($data->confirm_pass))
		$qry = $pdo_conn->prepare("UPDATE `teacher` SET `firstname` = '".$data->fname."', `lastname` = '".$data->lname."', `phone` = '".$data->contact."',`emailid` = '".$data->email."', `dept` = '".$data->dept."',`designation` = '".$data->designation."',`pwd` = '".$data->new_pass."', `first_login` = '0' WHERE `emp_id` = '".$id."'");
	else
		$qry = $pdo_conn->prepare("UPDATE `teacher` SET `firstname` = '".$data->fname."', `lastname` = '".$data->lname."', `phone` = '".$data->contact."',`emailid` = '".$data->email."', `dept` = '".$data->dept."',`designation` = '".$data->designation."', `first_login` = '0' WHERE `emp_id` = '".$id."'");
	$new_name = $pdo_conn->prepare("SELECT `firstname`,`lastname` FROM `admin` WHERE `emp_id` = '".$id."'");
	$new_name->execute();
	$new_name->setFetchMode(PDO::FETCH_ASSOC);
	foreach($new_name->fetchAll() as $value){
		$_SESSION['name'] = $value['firstname']." ".$value['lastname'];
	}
	if($qry->execute()) echo "Profile updated successfully.";
	else echo "Something went wrong. Please contact the developer.";

?>