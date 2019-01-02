<?php
require 'layout_page.php';
require_once 'db_connect.php';

if(!isset($_SESSION['user_id'])){
  echo '<h2 style="color:#C9302C">Log in First<h2>';
  header('refresh:1 ; url=login.php');
  die();
}

if(isset($_POST['submit'])){
	if(isset($_POST['bazar']) and isset($_POST['hospitality']) and isset($_POST['led']) and isset($_POST['good_buy']) and isset($_POST['others']) and isset($_POST['vara']) and isset($_POST['date'])){
	$bazar=$_POST['bazar'];
	$hospitality=$_POST['hospitality'];
	$led=$_POST['led'];
	$good_buy=$_POST['good_buy'];
	$others=$_POST['others'];
	$vara=$_POST['vara'];
	$date=$_POST['date'];
	$total=$bazar+$hospitality+$led+$good_buy+$others+$vara;
	if(!empty($bazar) and !empty($hospitality) and !empty($led) and !empty($good_buy) and !empty($others) and !empty($vara) and !empty($date)){
		$query="insert into daily_expense(bazar,hospitality	,led,good_buy,others,vara,date,total) values('$bazar', '$hospitality','$led','$good_buy', '$others', '$vara', '$date','$total')";

		$query_run=mysqli_query($conn,$query);
		header('Location: daily_expense.php');
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daily Expense</title>
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
				<h3 style="text-align: center; font-family: oblique;font-weight: 600"> প্রতিদিনের খরচ</h3><br>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		          <div class="form-group">
		            <label>বাজার</label>
		            <input type="number" name="bazar" class="form-control"  required>
		          </div>
		          <div class="form-group ">
		            <label>আতিথেয়তা</label>
		            <input type="number" name="hospitality" class="form-control" required>
		          </div>
		          <div class="form-group" >
		            <label>লেদ এর খরচ</label>
		            <input type="number" name="led"  class="form-control"  required>
		          </div>
		          <div class="form-group">
		            <label>মাল ক্রয়</label>
		            <input type="number" name="good_buy" id="" class="form-control"  required>
		          </div>
		          <div class="form-group">
		            <label>Others</label>
		            <input type="number" name="others" id="" class="form-control"  required>
		          </div>
		          <div class="form-group">
		            <label>Vara </label>
		            <input type="number" name="vara" id="" class="form-control"  required>
		          </div>
		          <div class="form-group">
		            <label>তারিখ</label>
		            <input type="date" name="date" id="" class="form-control"  required>
		          </div>
		          <p style="text-align: right"><button type="submit" name="submit" class="btn btn-danger" >সংরক্ষণ</button></p>
        		</form>
			</div>
	</div>
</body>
</html>