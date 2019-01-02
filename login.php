 <?php
ob_start();
session_start();
require_once 'db_connect.php';

if(isset($_POST["name"]) and isset($_POST["password"])){

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
			$name=test_input($_POST["name"]);
			$password=test_input($_POST["password"]);

			if(!empty($name) and !empty($password)){
				$query="select * FROM users ";
				$query_run=mysqli_query($conn,$query);

				while($row=mysqli_fetch_array($query_run)){
					$old_name=$row['name'];
					$old_password=$row['password'];
				}
				if($old_name==$name and $old_password=$password ){
					$_SESSION['user_id']=$password;
					header('location:index.php');
				}else{
					//echo '<h3 style="text-align:center;color:#C9302C">Username or Password Incorrect<h3>';
					$message="Wrong Information";
					// header('refresh:3 ; url=profile.php');
					?>
					 <script>
            var message= " <?php echo $message; ?> ";
            alert(message);
          </script>
					<?php
				}
			}
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="css/login.style.css">
 	 <script src="js/jquery.min.js"></script>
 	<script src="js/bootstrap.min.js"></script>

</head>

<body>
	<div class="container-fluid">
		<div class="row" style="">
			<div class="col-lg-4 col-md-5 col-lg-offset-4 col-md-offset-3 col-sm-6 col-sm-offset-3">
				<div class="well" >
					<div>
						<h3>Admin Login</h3>
					</div>
					<form action="login.php" id="form" method="POST">
					    <div class="form-group">
					      <label id="username" style="">Username:</label>
					      <input type="text" name="name" class="form-control" id="username" required>
					    </div>
					    <div class="form-group">
					      <label id="password" style="">Password:</label>
					      <input type="password" name="password" class="form-control" id="password" required>
					    </div>
					    <button type="submit" name="submit" class="btn btn-danger pull-right" style="">Login</button>
					    <div class="checkbox pull-left">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div id="message">
			
		</div>
	</div>
	
</body>

</html>
