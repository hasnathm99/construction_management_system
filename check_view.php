<?php
require 'layout_page.php';
require_once 'db_connect.php';

if(!isset($_SESSION['user_id'])){
  echo '<h2 style="color:#C9302C">Log in First<h2>';
  header('refresh:1 ; url=login.php');
  die();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Mobil on Equipment</title>
	<style type="text/css">
		
		h3{
			font-family: "calibri", Garamond, 'Comic Sans MS';
			/*text-decoration: underline;*/
		}
		#stock{
			height: 60%;
			padding-top: 5%
		}
		#onequip{
			height: 40%;
			padding-top: 5%
		}
		#btn{
			padding-top: 20%
		}
		#btn a{
			color: white;
			text-decoration: none
		}
		select{
			width: 30%;
			height: 30px;
			border-radius: 3px;

		}
	</style>

</head>
<body>
<!--Main Content Start-->
	<div id="main">
		<div style="width: 90%; ">
			<h3> <i class="fas fa-tint "></i>Equipment Oil Entry</h3>
			<hr>
		</div>
		<br>
		<div class="panel panel-default" style="width: 90%;">
    		<div class="panel-heading" >
    			<h3>বর্ণনা</h3>
    		</div>
  			<div class="panel-body">
  				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
					<div class="col-lg-6">
		          		<div class="form-group" >
							<label>Check List</label><br>
								<input type="radio" name="check" value="daily_expense" > Daily Expense<br>
								<input type="radio" name="check" value="Weekly_expense"> Weekly Expense<br>
								<input type="radio" name="check" value="monthly_expense"> Monthy Expense<br><br>
								<input type="radio" name="check" value="daily_employee_payment"> Daily Employee Payment<br><br>
								<input type="radio" name="check" value="weekly_employee_payment"> Weekly Employee Payment<br><br>
								<input type="radio" name="check" value="monthly_employee_payment"> Monthly Employee Payment<br><br>
		          		</div>
						
		          		<div class="form-group">
				            <label>Start Date</label>
				            <input type="date" name="start_date" class="form-control"  required >
		          		</div>
		          		<div class="form-group">
				            <label>End Date</label>
				            <input type="date" name="end_date" class="form-control"  required >
		          		</div>
						</div>
						<div class="col-lg-4" id="btn" style="padding-left: 10%">
							<button  type="" name="submit" class="btn btn-danger btn-md" > <i class="fas fa-long-arrow-alt-left"></i> <a href="machine_category.php" >Back</a></button>
							<button type="submit" name="submit" class="btn btn-success" > <i class="fas fa-plus"></i> Show</button>
						</div>
		          
        		</form>
  			</div>
  		</div>
	</div>
</body>
</html>
<?php
if(isset($_POST['check']) and isset($_POST['start_date']) and isset($_POST['end_date']) ){
	$check=$_POST['check'];
	$start_date=$_POST['start_date'];
	$end_date=$_POST['end_date'];
//daily expense check
	if($check=='daily_expense'){
		$query="select total from daily_expense where date between '$start_date' AND '$end_date' ";
		$query_run=mysqli_query($conn,$query);
		$sum=0;
		while($row=mysqli_fetch_array($query_run)){
			$sum=$sum+$row['total'];
	}
	?>
	<div class="">
		<div class="span">
			<div class="alert alert-success "><i class="icon-credit-card icon-large"></i>&nbsp;Total Bill of  :&nbsp;<?php echo $sum; ?></div>
		</div>
	</div>
	<?php
}
//weekly expense check
	else if($check=='Weekly_expense'){
		$query="select total from weekly_expense where date between '$start_date' AND '$end_date' ";
		$query_run=mysqli_query($conn,$query);
		$sum=0;
		while($row=mysqli_fetch_array($query_run)){
			$sum=$sum+$row['total'];
	}
	?>
	<div class="">
		<div class="span">
			<div class="alert alert-success "><i class="icon-credit-card icon-large"></i>&nbsp;Total Bill of  :&nbsp;<?php echo $sum; ?></div>
		</div>
	</div>
	<?php
	}
//monthly expense check
	else if($check=='monthly_expense'){
		$query="select total from monthly_expense where date between '$start_date' AND '$end_date' ";
		$query_run=mysqli_query($conn,$query);
		$sum=0;
		while($row=mysqli_fetch_array($query_run)){
			$sum=$sum+$row['total'];
	}
	?>
	<div class="">
		<div class="span">
			<div class="alert alert-success "><i class="icon-credit-card icon-large"></i>&nbsp;Total Bill of  :&nbsp;<?php echo $sum; ?></div>
		</div>
	</div>
	<?php
	}
//daily employee payment
	else if($check=='daily_employee_payment'){
		$query="select total from daily_employee_payments where date between '$start_date' AND '$end_date' ";
		$query_run=mysqli_query($conn,$query);
		$sum=0;
		while($row=mysqli_fetch_array($query_run)){
			$sum=$sum+$row['total'];
	}
	?>
	<div class="">
		<div class="span">
			<div class="alert alert-success "><i class="icon-credit-card icon-large"></i>&nbsp;Total Bill of  :&nbsp;<?php echo $sum; ?></div>
		</div>
	</div>
	<?php
	}
//weekly employee payment
	else if($check=='weekly_employee_payment'){
		$query="select total from daily_expense where date between '$start_date' AND '$end_date' ";
		$query_run=mysqli_query($conn,$query);
		$sum=0;
		while($row=mysqli_fetch_array($query_run)){
			$sum=$sum+$row['total'];
	}
	?>
	<div class="">
		<div class="span">
			<div class="alert alert-success "><i class="icon-credit-card icon-large"></i>&nbsp;Total Bill of  :&nbsp;<?php echo $sum; ?></div>
		</div>
	</div>
	<?php
	}
//monthly employee payment
	else if($check=='monthly_employee_payment'){
		$query="select total from monthly_employee_payments where date between '$start_date' AND '$end_date' ";
		$query_run=mysqli_query($conn,$query);
		$sum=0;
		while($row=mysqli_fetch_array($query_run)){
			$sum=$sum+$row['total'];
	}
	?>
	<div class="">
		<div class="span">
			<div class="alert alert-success "><i class="icon-credit-card icon-large"></i>&nbsp;Total Bill of  :&nbsp;<?php echo $sum; ?></div>
		</div>
	</div>
	<?php
	}
		}
		

?>