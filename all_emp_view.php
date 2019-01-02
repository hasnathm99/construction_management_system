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
	<title>Employee Information</title>
	<style type="text/css">
		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 16px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
</head> 
<body>
<!--Main Content Start-->
	<div id="main">
		<h3>মেশিন ভাড়ার বিবরণ</h3>
		<table class="data-table" >
		<caption class="title">Rent table</caption>
		<thead>
			<tr>
				<th>SL No</th>
				<th >Customer name</th>
				<th>Machine name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
				$query="select * from rent_status where status='2' ";
				$query_run=mysqli_query($conn,$query);
				$counter =0;
				while($row=mysqli_fetch_array($query_run)){
					$counter++;
					$id=$row['id'];
					$name=$row['customer_name'];
					$machine=$row['machine'];
					// $category=$row['category'];
				
				?>
				<tr>
					<td><?php echo $counter;?></td>
					<td><?php echo $name;?></td>
					<td><?php echo $machine;?></td>
					<td><a href="all_emp_view_process.php?id=<?php echo $id?>" name="view" class=" btn btn-info btn-xs view_data" id="<?php echo $row['id']; ?>" >View</a></td>
				</tr>
			</tbody>
		<?php } ?>
	

	</table>


	
	</div>
	
</body>
</html>
