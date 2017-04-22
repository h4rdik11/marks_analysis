<?php
	$conn = mysql_connect("localhost","root","") or die("Could not connect to server.");
	$db = mysql_select_db("mgmt_system",$conn) or die("Could not select the database.");

	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "mgmt_system";
	try{
		$pdo_conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
		$pdo_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Connection failed: ".$e->getMessage();
	}
?>