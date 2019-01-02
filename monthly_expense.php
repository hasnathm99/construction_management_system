<?php
require 'layout_page.php';
require_once 'db_connect.php';

if(!isset($_SESSION['user_id'])){
  echo '<h2 style="color:#C9302C">Log in First<h2>';
  header('refresh:1 ; url=login.php');
  die();
}

date_default_timezone_set('Asia/Dhaka');

if(isset($_POST['submit'])){
	if(isset($_POST['date']) and isset($_POST['electricity']) and isset($_POST['house']) and isset($_POST['nightguard']) and isset($_POST['water']) and isset($_POST['internet'])){
	$date=$_POST['date'];
	$electricity=$_POST['electricity'];
	$house=$_POST['house'];
	$nightguard=$_POST['nightguard'];
	$water=$_POST['water'];
	$internet=$_POST['internet'];

	if(!empty($date) and !empty($electricity) and !empty($house) and !empty($nightguard) and !empty($water) and !empty($internet)){
		$query="insert into  monthly_expense(date,electricity,house,nightguard,water,internet) values('$date', '$electricity','$house','$nightguard', '$water', '$internet')";
		$query_run=mysqli_query($conn,$query);
		header('Location: monthly_expense.php');
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Monthly Expense</title>
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
				<h3 style="text-align: center; font-family: oblique;font-weight: 600">মাসিক খরচ</h3><br>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
					<div class="form-group">
		            <label>মাসের নাম</label>
		            <input type="date" name="date" class="form-control"  required>
		            </div>
		          <div class="form-group">
		            <label>বিদ্যুৎ বিল</label>
		            <input type="number" name="electricity" class="form-control"  required>
		          </div>
		          <div class="form-group ">
		            <label>ঘর ভাড়া</label>
		            <input type="number" name="house" class="form-control" required>
		          </div>
		          <div class="form-group ">
		            <label>নাইট গার্ড</label>
		            <input type="number" name="nightguard" class="form-control" required>
		          </div>
		          <div class="form-group" >
		            <label>পানির বিল</label>
		            <input type="number" name="water"  class="form-control"  required>
		          </div>
		          <div class="form-group">
		            <label>ইন্টারনেট বিল</label>
		            <input type="number" name="internet" id="" class="form-control"  required>
		          </div>
		          <p style="text-align: right"><button type="submit" name="submit" class="btn btn-danger" >Save</button></p>
        		</form>
			</div>
	</div>
</body>
</html>