<?php
require 'layout_page.php';
require_once 'db_connect.php';

if(!isset($_SESSION['user_id'])){
  echo '<h2 style="color:#C9302C">Log in First<h2>';
  header('refresh:1 ; url=login.php');
  die();
}

if(isset($_POST['submit'])){
	if(isset($_POST['name']) and isset($_POST['amount']) and isset($_POST['date'])){
	$name=$_POST['name'];
	$amount=$_POST['amount'];
	$date=$_POST['date'];

	if(!empty($name) and !empty($amount) and !empty($date)){
		$query="insert into daily_employee_payments(name,amount,date) values('$name','$amount', '$date')";
		$query_run=mysqli_query($conn,$query);
		header('Location:daily_employee_payment.php');
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daily Payment </title>
	<style type="text/css">
		.well{
			width: 50%;
			margin-left: 20%
		}
		h3{
			font-family: "calibri", Garamond, 'Comic Sans MS';
			text-decoration: underline;
		}
		#main{
			padding-top: 15%
		}
	</style>
</head>
<body>
<!--Main Content Start-->
	<div id="main">
		<div class="well ">
				<h3 style="text-align: center; font-family: oblique;font-weight: 600">কর্মচারীর প্রতিদিনের বেতন</h3><br>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		          <div class="form-group">
		            <label>কর্মচারীর নাম</label>
		            <input type="text" name="name" class="form-control"  required>
		          </div>
		          <div class="form-group ">
		            <label>টাকার পরিমান</label>
		            <input type="number" name="amount" class="form-control" required>
		          </div>
		          <div class="form-group" >
		            <label>তারিখ</label>
		            <input type="date" name="date"  class="form-control"  required>
		          </div>
		          <p style="text-align: right"><button type="submit" name="submit" class="btn btn-danger" >সংরক্ষণ</button></p>
        		</form>
		</div>
	</div>
</body>
</html>