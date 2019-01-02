<?php
require 'layout_page.php';
require_once 'db_connect.php';

if(!isset($_SESSION['user_id'])){
  echo '<h2 style="color:#C9302C">Log in First<h2>';
  header('refresh:1 ; url=login.php');
  die();
}
if(isset($_POST['submit'])){

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
	return $data;
	}
	if(isset($_POST['name']) and isset($_POST['type']) and isset($_POST['amount']) and isset($_POST['date']) ){
	$name=test_input($_POST["name"]);
	$type=test_input($_POST["type"]);
	$amount=test_input($_POST["amount"]);
	$date=test_input($_POST["date"]);
	if(!empty($name) and !empty($type) and !empty($amount) and !empty($date)){
		$query="insert into stock(name,type,amount,entry_date) values('$name', '$type', '$amount', '$date')";
		$query_run=mysqli_query($conn,$query);
		if($query_run){
			$message="information added succesfully";
			header('refresh:5 ; url=stock.php');
			?>
			<script>
         		var message= " <?php echo $message; ?> ";
         		alert(message);
       		</script>
			<?php
		}
	}
}
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
	</style>

</head>
<body>
<!--Main Content Start-->
	<div id="main">
		<div style="width: 90%; ">
			<h3> <i class="fas fa-tint "></i> Stock Entry</h3>
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
						<div class="form-group">
				            <label>নাম</label>
				            <input type="text" name="name" class="form-control"  required >
		          		</div>
						<div class="form-group">
				            <label>প্রকার</label>
				            <input type="text" name="type" class="form-control"  required >
		          		</div>
		          		<div class="form-group">
				            <label>পরিমাণ</label>
				            <input type="number" name="amount" class="form-control"  required >
		          		</div>
		          		<div class="form-group">
				            <label>তারিখ</label>
				            <input type="date" name="date" class="form-control"  required >
		          		</div>
						</div>
						<div class="col-lg-4" id="btn" style="padding-left: 10%">
							<button  type="" name="submit" class="btn btn-danger btn-md" > <i class="fas fa-long-arrow-alt-left"></i> <a href="index.php" >Back</a></button>
							<button type="submit" name="submit" class="btn btn-success" > <i class="fas fa-plus"></i> Save</button>
						</div>
		          
        		</form>
  			</div>
  		</div>
	</div>
</body>
</html>