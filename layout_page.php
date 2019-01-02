<?php
ob_start();
session_start();
require 'db_connect.php';

if(!isset($_SESSION['user_id'])){
  echo '<h2 style="color:#C9302C">Log in First<h2>';
  header('refresh:1 ; url=login.php');
  die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="css/layout_page.style.css">
 	<!-- <script src="js/jquery.min.js"></script> -->
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	<script src="js/bootstrap.min.js"></script>
 	<link rel="icon" href="images/fav.jpg" type="image/x-icon"/>
 	<link rel="stylesheet" type="text/css" href="css/all.css">
 	<style type="text/css">
 		
 	</style>
</head>
<body>

	<!--navbar-->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand"><img src="images/mns.jpg" width="200" height="55"></a>
				<button class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse" id="navbar-collapse-main">
				<ul class="nav navbar-nav navbar-right">
					<li class="navbar-nav" style=""><a href="machine_category.php" ><i class="fas fa-user"></i> Machines</a></li>	
					<li class="navbar-nav"><a href="rent_equipment.php"><i class="fas fa-retweet"></i> Rent</a></li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Expenses<span class="caret"></span></a>
				        <ul class="dropdown-menu">
				          <li><a href="daily_employee_payment.php">Daily </a></li>
				          <li><a href="weekly_employee_payment.php">Weekly </a></li>
				          <li><a href="monthly_employee_payment.php">Monthly </a></li>
				        </ul>
				    </li>
				    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Employee<span class="caret"></span></a>
				        <ul class="dropdown-menu">
				          <li><a href="daily_expense.php">Daily </a></li>
				          <li><a href="weekly_expense.php">Weekly </a></li>
				          <li><a href="monthly_expense.php">Monthly </a></li>
				        </ul>
				    </li>
				    <li class="navbar-nav"><a href="stock.php"><i class="fas fa-archive"></i> Stock</a></li>
					<li class="navbar-nav"><a href="equipment_oil.php"><i class="fas fa-tint"></i> Equipment Oil</a></li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-eye"></i> Views <span class="caret"></span>  </a>
						<ul class="dropdown-menu" id="item">
							<li ><a href="check_view.php"> Check View</a></li>
							<li ><a href="rent_status_view.php"> Rent Status</a></li>
							<li><a href="daily_expense_view.php" style="">Daily Expenses</a></li>
							<li><a href="weekly_expense_view.php" style="">Weekly Expenses</a></li>
							<li><a href="monthly_expense_view.php" style="">Monthly Expenses</a></li>
							<li><a href="daily_employee_payments_view.php" style="">Daily Emp Payments</a></li>
							<li><a href="weekly_employee_payment_view.php" style="">Weekly Emp Payments</a></li>
							<li><a href="monthly_employee_payments_view.php" style="">Monthly Emp Payments</a></li>
							<li><a href="stock_view.php" style=""> Stock View</a></li>
							<li><a href="equipment_oil_view.php" style=""> Equipment Oil View</a></li>
							<li><a href="all_emp_view.php" style=""> View all Employee</a></li>
							
						</ul>
					</li>

					<!-- <li><a href="index.php"><i class="fas fa-home" style="padding-right: 5px;padding-left: 15px "></i>Home</a></li> -->
					<li><a href="profile.php"><i class="fas fa-home" style="padding-right: 5px;padding-left: 15px "></i>Profile</a></li>
					<li><a href="logout.php"><i class="fas fa-sign-out-alt" style="padding-right: 5px;padding-left: 15px "></i>Logout</a></li>
	
				</ul>
			</div>
		</div>
	</nav>
	<!--navbar end-->

	<!--left Sidebar start-->
	<!-- <div id="sidebar"  >
		<ul class="nav  nav-stacked" style="" id="mainnav">
				
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-money-check-alt"></i> Expenses <span class="caret"></span>  </a>
				<ul class="dropdown-menu" id="item">
					<li ><a href="daily_expense.php"><i class="fas fa-dot-circle"></i> Daily Expenses</a></li>
					<li ><a href="weekly_expense.php"><i class="fas fa-dot-circle"></i> Weekly Expenses</a></li>
					<li><a href="monthly_expense.php" style=""><i class="fas fa-dot-circle"></i> Monthly Expenses</a></li>
					
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-users"></i> Employee Payments<span class="caret"></span>  </a>
				<ul class="dropdown-menu" id="item">
					<li ><a href="daily_employee_payment.php"><i class="fas fa-dot-circle"></i> Daily</a></li>
					<li ><a href="weekly_employee_payment.php"><i class="fas fa-dot-circle"></i> Weekly</a></li>
					<li><a href="monthly_employee_payment.php" style=""><i class="fas fa-dot-circle"></i> Monthly</a></li>
					
				</ul>
			</li>
			<li class="navbar-nav"><a href="stock.php"><i class="fas fa-archive"></i> Stock</a></li>
			<li class="navbar-nav"><a href="equipment_oil.php"><i class="fas fa-tint"></i> Equipment Oil</a></li>
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-eye"></i> Views <span class="caret"></span>  </a>
				<ul class="dropdown-menu" id="item">
					<li ><a href="check_view.php"><i class="fas fa-dot-circle"></i> Check View</a></li>
					<li ><a href="rent_status_view.php"><i class="fas fa-dot-circle"></i> Rent Status</a></li>
					<li><a href="daily_expense_view.php" style=""><i class="fas fa-dot-circle"></i> Daily Expenses</a></li>
					<li><a href="weekly_expense_view.php" style=""><i class="fas fa-dot-circle"></i> Weekly Expenses</a></li>
					<li><a href="monthly_expense_view.php" style=""><i class="fas fa-dot-circle"></i> Monthly Expenses</a></li>
					<li><a href="daily_employee_payments_view.php" style=""><i class="fas fa-dot-circle"></i> Daily Employee Payments</a></li>
					<li><a href="weekly_employee_payment_view.php" style=""><i class="fas fa-dot-circle"></i> Weekly Employee Payments</a></li>
					<li><a href="monthly_employee_payments_view.php" style=""><i class="fas fa-dot-circle"></i> Monthly Employee Payments</a></li>
					<li><a href="stock_view.php" style=""><i class="fas fa-dot-circle"></i> Stock View</a></li>
					<li><a href="equipment_oil_view.php" style=""><i class="fas fa-dot-circle"></i> Equipment Oil View</a></li>
					<li><a href="all_emp_view.php" style=""><i class="fas fa-dot-circle"></i> View all Employee</a></li>
					
				</ul>
			</li>	
			<!-- <li class="navbar-nav"><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li> -->	
		</ul>
	</div> -->
	<!--left Sidebar end-->
	
	
</body>
</html>