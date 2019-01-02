<?php
require ('db_connect.php');


	$edit_id=$_POST['edit_id'];
	$name=$_POST['name'];
	$type=$_POST['type'];
	$amount=$_POST['amount'];
	$date=$_POST['date'];
 
	$query="update stock set name='".$name."', type='".$type."', amount='".$amount."',date='".$date."' where id='".$edit_id."' ";
	$query_run=mysqli_query($conn,$query);
	

?>