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
	<title>Stock View</title>
	

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
		#btn a{
			text-decoration: none
		}
	</style>
</head>
<body>
<!--Main Content Start-->
	<div id="main">
		<h3>স্টক পরিমাণ</h3>
		<table class="data-table" >
		<caption class="title">Stock Table</caption>
		<thead>
			<tr>
				<th>নাম</th>
				<th>ধরণ</th>
				<th>পরিমাণ</th>
				<th>তারিখ</th>
				<th>পরিবর্তন করুন</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$query="select * from stock";
			$query_run=mysqli_query($conn,$query);
			while ($row = mysqli_fetch_assoc($query_run))
			{	?>		
				<tr id="<?php echo $row['id']; ?>">
	                <td data-target="name"><?php echo $row['name']; ?></td>
	                <td data-target="type"><?php echo $row['type']; ?></td>
	                <td data-target="amount"><?php echo $row['amount']; ?></td>
	                <td data-target="date"><?php echo $row['entry_date']; ?></td>
	                <td><button class="btn btn-info btn-xs" id="btn"><a href="#" data-role="update" data-id="<?php echo $row['id'] ;?>">Update</a></button></td>
              </tr>

		<?php } ?>
		</tbody>

	</table>
		
	</div>
</body>
</html>

<!-- Add machine Modal start -->
<!-- Modal -->
    <div id="mymodal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>Name</label>
                <input type="text" id="name" class="form-control">
              </div>
              <div class="form-group">
                <label>type</label>
                <input type="text" id="type" class="form-control">
              </div>

               <div class="form-group">
                <label>amount</label>
                <input type="number" id="amount" class="form-control">
              </div>
              <div class="form-group">
                <label>date</label>
                <input type="date" id="entry_date" class="form-control">
              </div>
                <input type="hidden" id="userId" class="form-control">
          </div>
          <div class="modal-footer">
            <a href="#" id="save" class="btn btn-primary ">Update</a>
            <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
<!-- Modal end -->

<script type="text/javascript">
	//edit data
	$(document).ready(function(){
		//append values in input field
		$(document).on('click','a[data-role=update]',function(){
            var id  = $(this).data('id');
            var name  = $('#'+id).children('td[data-target=name]').text();
            var type  = $('#'+id).children('td[data-target=type]').text();
            var amount  = $('#'+id).children('td[data-target=amount]').text();
            var entry_date  = $('#'+id).children('td[data-target=date]').text();

            $('#name').val(name);
            $('#type').val(type);
            $('#amount').val(amount);
            $('#entry_date').val(entry_date);
            $('#userId').val(id);
            $('#mymodal').modal('toggle');
      });

		//get data from input field
		$('#save').click(function(){

          var id  = $('#userId').val(); 
         var name =  $('#name').val();
          var type =  $('#type').val();
          var amount =   $('#amount').val();
          var entry_date =   $('#entry_date').val();

          $.ajax({
              url      : 'edit_data.php',
              method   : 'post', 
              data     : {name : name , type: type , amount : amount , entry_date:entry_date , id: id},
              success  : function(response){
                            // now update user record in table 
                             $('#'+id).children('td[data-target=name]').text(name);
                             $('#'+id).children('td[data-target=type]').text(type);
                             $('#'+id).children('td[data-target=amount]').text(amount);
                             $('#'+id).children('td[data-target=entry_date]').text(entry_date);
                             $('#mymodal').modal('toggle');
                             alert('data updated successfylly');
                             location.reload();
                         }
          });
	});
});
</script>