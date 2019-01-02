<?php
require_once('constants.php');

$conn=mysqli_connect(db_host, db_user, db_pass, db_name);
if(!$conn){
	echo "---connection error---";
}
?>