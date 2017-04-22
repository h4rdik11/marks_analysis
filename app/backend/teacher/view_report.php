<?php  
	session_start();
	require_once("../config.php");
	if(isset($_GET['id'])) $sub_id =$_GET['id'];
	if(isset($_GET['sem'])) $sem =$_GET['sem'];
	if(isset($_SESSION['emp_id'])) $emp = $_SESSION['emp_id'];
	
	$qry = $pdo_conn->prepare("SELECT * FROM `marks` INNER JOIN `student` ON `marks`.`student_id` = `student`.`id` WHERE `marks`.`sub_id` = '".$sub_id."' AND `marks`.`sem` = '".$sem."' AND `marks`.`teacher_id` = '".$emp."'");
	$qry->execute();
	$qry->setFetchMode(PDO::FETCH_ASSOC);
	$count = 0;

	$sub_name = $pdo_conn->prepare("SELECT `sub_name`,`course` FROM `subject` WHERE `sub_id` = '".$sub_id."' AND `empid` = '".$emp."'");
	$sub_name->execute();
	$sub_name->setfetchMode(PDO::FETCH_ASSOC);
	$subject = "";
	$course = "";
	foreach ($sub_name->fetchAll() as $value) {
		$subject = $value['sub_name'];
		$course = $value['course'];
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Teacher Dashboard</title>

    <!-- Bootstrap -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design -->
    <link rel="stylesheet" href="../../../css/material.min.css">
    <script src="../../../js/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../css/font-awesome.min.css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../../js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    	.table{ margin-top: 4%; }
    	.table tr td{ font-size: 15px; font-weight: 600 }
    </style>
    <script type="text/javascript">
    	window.print();
    </script>
  </head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<center>
					<div class="row">
						<div class="col-md-6"><h4><b>Subject : </b><?php echo $subject; ?></h4></div>
						<div class="col-md-6"><h4><b>Course : </b><?php echo $course."( ".$sem." )"; ?></h4></div>
					</div>
				</center>
				<table class="table">
					<thead>
						<th><center>S.No.</center></th>
						<th><center>Roll No.</center></th>
						<th><center>Name</center></th>
						<th><center>Internal( 10 )</center></th>
						<th><center>Internal( 15 )</center></th>
						<th><center>Total</center></th>
					</thead>
					<tbody>
				<?php 
					foreach($qry->fetchAll() as $value){
						$count+=1;
				?>	
					<tr>
						<td><center><?php echo $count; ?></center></td>
						<td><center><?php echo $value['id']; ?></center></td>
						<td><center><?php echo $value['fname']." ".$value['lname'] ?></center></td>
						<td><center><?php echo $value['internal_10']; ?></center></td>
						<td><center><?php echo $value['internal_15']; ?></center></td>
						<td><center><?php echo $value['total']; ?></center></td>
					</tr>
				<?php		
					}
				?>
					</tbody>
				</table>	
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>