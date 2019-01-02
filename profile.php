<?php
require 'layout_page.php';
require_once 'db_connect.php';

if(!isset($_SESSION['user_id'])){
  echo '<h2 style="color:#C9302C">Log in First<h2>';
  header('refresh:1 ; url=login.php');
  die();
}


$query="select * from users";
$query_run=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($query_run)){
	$id=$row['id'];
	$name=$row['name'];
}
			

?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style type="text/css">
		table, th, td {
			    border-collapse: collapse;
			}
			th, td {
			    padding: 15px;
			}
			#btn a{
					text-decoration: none
				}
	</style>
	
</head>
<body>
<!--Main Content Start-->
	<!--main content start-->
	<div id="main" >
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 ">
					<img src="images/pp.jpg" class="img-thumbnail img-responsive" width="250" height="200">
				</div>
			</div>
			<hr>
			<div  class="row" >
				<div class="col-lg-6 col-lg-offset-2 ">
					<table class="table-info" style="width: 100%" >
						<tr>
							<th>Name</th>
							<td>Wahidul Jewel</td>
						</tr>
						<tr>
							<th>Designation</th>
							<td>CEO,Maoula $ Sons Construction</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>wahidul7400@gmail.com</td>
						</tr>
						<tr>
							<th>Mobile Number</th>
							<td>01911771544</td>
						</tr>

					</table>
				</div>

				<br><br>
				
				<a href="pass_change.php?id=<?php echo $id;?>" name="view" class=" btn btn-info btn-md view_data" id="<?php echo $row['id']; ?>" >Change Password</a>
						
			</div>			
		</div>
	</div>
	<!--main area end-->
</body>
</html>

<?php



?>

