<?php
require ('db_connect.php');

if (isset($_POST['id'])) {
	$id=$_POST['id'];
	$name=$_POST['name'];
	$type=$_POST['type'];
	$amount=$_POST['amount'];
	$entry_date=$_POST['entry_date'];

	$query="update stock set name='$name' , type='$type' , amount='$amount' , entry_date='$entry_date' where id='$id' ";
	$query_run=mysqli_query($conn,$query);
	if($query_run){
		echo $message='data updated successfully';
	}
}
?>
