<?php  
	session_start();
	require_once("../config.php");
	if(isset($_SESSION['stu_id'])) $id = $_SESSION['stu_id'];
	$data = json_decode(file_get_contents("php://input"));
	if(isset($data->new_pass) && isset($data->confirm_pass))
		$qry = $pdo_conn->prepare("UPDATE `student` SET `fname` = '".$data->fname."', `lname` = '".$data->lname."', `contact` = '".$data->contact."',`email` = '".$data->email."', `gender` = '".$data->gender."',`address` = '".$data->address."',`pwd` = '".$data->new_pass."', `first_login` = '0' WHERE `id` = '".$id."'");
	else
		$qry = $pdo_conn->prepare("UPDATE `student` SET `fname` = '".$data->fname."', `lname` = '".$data->lname."', `contact` = '".$data->contact."',`email` = '".$data->email."', `gender` = '".$data->gender."',`address` = '".$data->address."', `first_login` = '0' WHERE `id` = '".$id."'");
	$new_name = $pdo_conn->prepare("SELECT `fname`,`lname` FROM `student` WHERE `id` = '".$id."'");
	$new_name->execute();
	$new_name->setFetchMode(PDO::FETCH_ASSOC);
	foreach($new_name->fetchAll() as $value){
		$_SESSION['name'] = $value['fname']." ".$value['lname'];
	}
	if($qry->execute()) echo "Profile updated successfully.";
	else echo "Something went wrong. Please contact the developer.";

?>