<?php
require_once 'db_connect.php';
 $id =  $_GET['customer_id'];

if($_POST['status'] ==2 ){

	$s = $_POST['status'];
	$query1 = "update rent_status set status =  '$s' where id = '$id'";
	$query1_run=mysqli_query($conn,$query1);
	if($query1_run){
		header("Location: rent_status_view.php");
	}
}
	
else{
	date_default_timezone_set('Asia/Dhaka');
	// $payment = $_POST['payment'];
	$date = $_POST['date'];
	$travel_from = $_POST['travel_from'];
	$travel_to = $_POST['travel_to'];
	$site = $_POST['site'];
	$running_time = $_POST['running_time'];
	$break_time = $_POST['break_time'];
	$neat_time = $_POST['neat_time'];
	$hour_rate = $_POST['hour_rate'];
	$oil = $_POST['oil'];
	$total_bill = $_POST['total_bill'];
	
	$query1 = "insert into payment(customer_id,date,travel_from,travel_to,site,running_time,break_time,neat_time,hour_rate,oil,total_bill) values('$id','$date','$travel_from','$travel_to','$site','$running_time','$break_time','$neat_time','$hour_rate','$oil','$total_bill')";
	$query1_run=mysqli_query($conn,$query1);
	if($query1_run){
		header("Location: rent_process.php?id= $id");
	}
	
}

?>