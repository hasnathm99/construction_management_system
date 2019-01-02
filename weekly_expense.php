<?php
require 'layout_page.php';
require_once 'db_connect.php';

if(!isset($_SESSION['user_id'])){
  echo '<h2 style="color:#C9302C">Log in First<h2>';
  header('refresh:1 ; url=login.php');
  die();
}

if(isset($_POST['submit'])){
	if(isset($_POST['date']) and isset($_POST['description']) and isset($_POST['amount'])){
	$date=$_POST['date'];
	$description=$_POST['description'];
	$amount=$_POST['amount'];

	if(!empty($date) and !empty($description) and !empty($amount)){
		$query="insert into weekly_expense(date,description,amount) values('$date','$description','$amount')";
		$query_run=mysqli_query($conn,$query);
		header('Location: weekly_expense.php');
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Weekly Expense</title>
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
			padding-top: 10%
		}
	</style>
</head>
<body>
<!--Main Content Start-->
	<div id="main">
		<div class="well ">
				<h3 style="text-align: center; font-family: oblique;font-weight: 600"> সাপ্তাহিক খরচ</h3><br>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		          	<div class="form-group">
			            <label>তারিখ</label>
			            <input type="date" name="date" class="form-control"  required>
		          	</div>
		          	<div class="form-group">
			          	<label id="label">বর্ণনা</label><br>
			          	<textarea id="textarea" name="description" rows="3" cols="30" placeholder="Enter description here"></textarea>
			        </div>
			        <div class="form-group">
		            	<label>পরিমাণ</label>
		           		<input type="number" name="amount" class="form-control"  required>
		          	</div>
		          <p style="text-align: right"><button type="submit" name="submit" class="btn btn-danger" >সংরক্ষণ</button></p>
        		</form>
			</div>
	</div>
</body>
</html>