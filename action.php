<?php
$connect = mysqli_connect('localhost', 'root', '', 'construction');
echo $id=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-lg-0ffset-2">
			<form action="action.php" method="POST">
				<?php
				$query="select * from payment where id='$id' ";
				$query_run=mysqli_query($connect,$query);
				while($row=mysqli_fetch_array($query_run)){
					$travel_from=$row['travel_from'];
					$travel_to=$row['travel_to'];
					$date=$row['date'];
					$site=$row['site'];
					$running_time=$row['running_time'];
					$break_time=$row['break_time'];
					$neat_time=$row['neat_time'];
					$hour_rate=$row['hour_rate'];
					$oil=$row['oil'];
					$total_bill=$row['total_bill'];
				}
				?>
				<div class="form-group">
			    	<label>Date</label>
			    	<input type="date" name="date" class="form-control" placeholder="<?php echo $date ?>">
				</div>
				<div class="form-group">
			    	<label>Travel from</label>
			    	<input type="text" name="travel_from" class="form-control" placeholder="<?php echo $travel_from ?>">
				</div>
				<div class="form-group">
			    	<label>Travel To</label>
			    	<input type="text" name="travel_to" class="form-control" placeholder="<?php echo $travel_to ?>">
				</div>
				<div class="form-group">
			    	<label>Site</label>
			    	<input type="text" name="site" class="form-control" placeholder="<?php echo $site ?>">
				</div>
				<div class="form-group">
			    	<label>Running Time</label>
			    	<input type="text" name="running_time" id="running_time" class="form-control" placeholder="<?php echo $running_time ?>">
				</div>
				<div class="form-group">
			    	<label>Break Time</label>
			    	<input type="text" name="break_time" id="break_time" class="form-control" placeholder="<?php echo $break_time ?>">
				</div>
				<div class="form-group">
			    	<label>Neat Time</label>
			    	<input type="text" name="neat_time" id="neat_time" class="form-control" placeholder="<?php echo $neat_time ?>">
				</div>
				<div class="form-group">
			    	<label>Hour Rate</label>
			    	<input type="text" name="hour_rate" id="hour_rate" class="form-control" placeholder="<?php echo $hour_rate ?>">
				</div>
				<div class="form-group">
			    	<label>Oil</label>
			    	<input type="text" name="oil" class="form-control" placeholder="<?php echo $oil ?>">
				</div>
				<div class="form-group">
			    	<label>Total Bill</label>
			    	<input type="text" name="total_bill" id='total_bill' class="form-control" placeholder="<?php echo $total_bill ?>">
				</div>
				<div class="form-group">
					<input type="submit" name="submit">
				</div>
			</form>
		</div>
	</div>
</body>
</html>
<?php
if(isset($_POST['date']) and isset($_POST['travel_from']) and isset($_POST['travel_to']) and isset($_POST['site']) and isset($_POST['running_time']) and isset($_POST['break_time']) and isset($_POST['neat_time']) and isset($_POST['hour_rate']) and isset($_POST['oil']) and isset($_POST['total_bill'])){
	$date=$_POST['date'];
	$travel_from=$_POST['travel_from'];
	$travel_to=$_POST['travel_to'];
	$site=$_POST['site'];
	$running_time=$_POST['running_time'];
	$break_time=$_POST['break_time'];
	$neat_time=$_POST['neat_time'];
	$hour_rate=$_POST['hour_rate'];
	$oil=$_POST['oil'];
	$total_bill=$_POST['total_bill'];

	$query="update payment set date='$date' , travel_from='$travel_from' , travel_to='$travel_to' , site='$site' , running_time='$running_time' , break_time='$break_time' , neat_time='$neat_time' , hour_rate='$hour_rate' , oil='$oil' , total_bill='$total_bill' where id='$id' ";
	$query_run=mysqli_query($connect, $query);

}
?>