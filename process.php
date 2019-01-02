<?php
require ('db_connect.php');
$name=$_POST['name'];
$category=$_POST['category'];

$query="insert into machines(name,category) value('$name','$category')";
$query_run=mysqli_query($conn,$query);
?>