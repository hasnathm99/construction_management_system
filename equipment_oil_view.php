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
	<title>daily Expense  view</title>
	<style type="text/css">
		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 16px;
			min-width: 700px;
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
		table{margin-bottom: 20px}
	</style>

</head>
<body>
<!--Main Content Start-->
	<div id="main">
		<h3>মেশিনে তেলের বিবরণ</h3>
		<table class="data-table" >
		<caption class="title">Equipment oil table</caption>
		<thead>
			<tr>
				<th>তারিখ</th>
				<th>তেলের নাম</th>
				<th>যন্ত্রের নাম</th>
				<th>পরিমাণ</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$query="select * from equipment_oil order by date desc";
			$query_run=mysqli_query($conn,$query);
			while ($row = mysqli_fetch_assoc($query_run))
			{			
				echo '<tr>
						<td>'. date('M d, Y', strtotime($row['date'])) . '</td>
						<td>'.$row['oil_name'].'  </td>
						<td>'.$row['type'].' </td>
						<td>'.$row['amount'].' Lt </td>	
					</tr>';

		}?>
		</tbody>

	</table>
	</div>
</body>
</html>