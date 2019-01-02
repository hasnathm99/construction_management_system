<?php
require 'layout_page.php';
require_once 'db_connect.php';


if(!isset($_SESSION['user_id'])){
  echo '<h2 style="color:#C9302C">Log in First<h2>';
  header('refresh:1 ; url=login.php');
  die();
}
$id=$_GET['id']; 

	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Rent Status</title>
</head>
<body>
<!--Main Content Start-->
	<div id="main" >
		<h3>Rent Status View</h3>
		<div>
			<ul style="list-style: none">
			<?php
			$query="select * from rent_status where id='$id' ";
			$query_run=mysqli_query($conn,$query);
			while($row=mysqli_fetch_array($query_run)){
				$id=$row['id'];
				$name=$row['customer_name'];
				$machine=$row['machine'];
				$mob_no=$row['mob_no'];
				$date=$row['date'];
				$site=$row['site'];
			?>
				<li><b>Customer Name:&emsp;</b><?php echo $name;?></li>
				<li><b>Equipment Name:&emsp;</b> <?php echo $machine;?></li>
				<li><b>Rent Date:&emsp;</b> <?php echo $date;?></li>
				<li><b>Site Name:&emsp;</b> <?php echo $site;?></li>
				<li><b>Contact Num:&emsp;</b> <?php echo $mob_no;?></li>
			<?php } ?>
		</ul>
		</div>
		<hr>
		
		<!-- <button class="btn" style="background-color: #C7CBD1;margin-bottom: 5%"><a href="rent_status_view.php"  id="ancor" ><i class="fas fa-long-arrow-alt-left"></i> Back</a></button> -->
		<div class="row">
			<div class="col-lg-9">
				<div class="table-responsive">
				<table class="table table-bordered table-hover table-responsive"  >
		<!-- <caption class="title">'s table</caption> -->
					<thead>
						<tr>
							<th >SL No </th>
							<th>date</th>
							<th>travel_from</th>
							<th>travel_to</th>
							<th>Site Name</th>
							<th>running_time</th>
							<th>break_time</th>
							<th>neat_time</th>
							<th>hour_rate</th>
							<th>oil/Fuel</th>
							<th>total_bill</th>
              <th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query="select * from payment where customer_id='$id' ";
						$query_run=mysqli_query($conn,$query);
						$counter =0;
						while($row=mysqli_fetch_array($query_run)){
							$counter++;
							$date=$row['date'];
							$travel_from=$row['travel_from'];
							$travel_to=$row['travel_to'];
							$site=$row['site'];
							$running_time=$row['running_time'];
							$break_time=$row['break_time'];
							$neat_time=$row['neat_time'];
							$hour_rate=$row['hour_rate'];
							$oil=$row['oil'];
							$total_bill=$row['total_bill'];
						
						?>
						<tr>
							<td><?php echo $counter;?></td>
							<td><?php echo date("d/m/Y", strtotime($date)) ?></td>
							<td><?php echo $travel_from;?></td>
							<td><?php echo $travel_to;?></td>
							<td><?php echo $site;?></td>
							<td><?php echo $running_time;?> H</td>
							<td><?php echo $break_time;?> H</td>
							<td><?php echo $neat_time;?> H</td>
							<td>BDT <?php echo $hour_rate;?>Tk</td>
							<td><?php echo $oil;?> Li</td>
							<td>BDT <?php echo $total_bill;?> Tk</td>
              <td><button><a href="action.php?id=<?php echo $row['id']; ?>">Edit</a></button></td>

						</tr>
					</tbody>
			<?php } ?>
	

	</table>
	<?php
		$query="SELECT sum(total_bill) FROM payment where customer_id='$id'";
		$query_run=mysqli_query($conn,$query);
		
		while ($rows = mysqli_fetch_array($query_run)) {
	?>
	<div class="">
		<div class="span">
			<div class="alert alert-success "><i class="icon-credit-card icon-large"></i>&nbsp;Total Bill of <?php echo $name; ?> :&nbsp;<?php echo $rows['sum(total_bill)']; ?></div>
		</div>
	</div>
	<?php }?>
	</div>
			</div>
			<div class="col-lg-3" >

				<form action="rent_process2.php?customer_id= <?php echo $id ?>" method="POST" >
					
	                <div class="panel panel-default">
				    	<div class="panel-heading">Enter Renew Information</div>
					    <div class="panel-body">
					    	<div class="form-group">
			                	<label>Date</label>
			                	<input type="date" name="date" class="form-control" >
		                	</div>
		                	<div class="form-group">
			                	<label>Travel from</label>
			                	<input type="text" name="travel_from" class="form-control" >
		                	</div>
		                	<div class="form-group">
			                	<label>Travel To</label>
			                	<input type="text" name="travel_to" class="form-control" >
		                	</div>
		                	<div class="form-group">
			                	<label>Site Name</label>
			                	<input type="text" name="site" class="form-control" >
		                	</div>
		                	<div class="form-group">
			                	<label>Running Time(H)</label>
			                	<input type="number" name="running_time" id="running_time" class="form-control" >
		                	</div>
		                	<div class="form-group">
			                	<label>Break Time(H)</label>
			                	<input type="number" name="break_time" id="break_time" class="form-control" >
		                	</div>
		                	<div class="form-group">
			                	<label>Neat Time(H)</label>
			                	<input type="number" name="neat_time" id="neat_time" class="form-control" >
		                	</div>
		                	<div class="form-group">
			                	<label>Hour Rate</label>
			                	<input type="number" name="hour_rate" id="hour_rate" class="form-control" >
		                	</div>
		                	<div class="form-group">
			                	<label>Oil/Fuel</label>
			                	<input type="number" name="oil" class="form-control" >
		                	</div>
		                	<div class="form-group">
			                	<label>Total Bill</label>
			                	<input type="number" name="total_bill" id="total_bill" class="form-control" >
		                	</div>
		                	<div class="form-group">
			                	<label>Leave Machine</label><br>
			                	<div class="radio">
							      <label><input name="status" value="1" type="radio" name="optradio" checked>No</label>
							    </div>
							    <div class="radio">
							      <label><input name="status" value="2" type="radio" name="optradio">Yes</label>
							    </div>
		                	</div>
		                	<button type="submit" name="submit" class="btn btn-success pull-right" > <i class="fas fa-plus"></i> Save</button>
					    </div>
				    	
				    
				</div>
	                
				</form>
			</div>
		</div>
		<script type="text/javascript">
			$(function() {
			    $("#running_time, #break_time").on("keydown keyup", sum);
			  	function sum() {
			  	$("#neat_time").val(Number($("#running_time").val()) - Number($("#break_time").val()));
			  	}
			  	
			  	$("#neat_time, #hour_rate").on("keydown keyup", multi);
			  	function multi() {
			  	$("#total_bill").val(Number($("#neat_time").val()) * Number($("#hour_rate").val()));
			  	}
			});
		</script>
</body>
</html>
