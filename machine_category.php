<?php
ob_start();
require 'layout_page.php';

if(!isset($_SESSION['user_id'])){
  echo '<h2 style="color:#C9302C">Log in First<h2>';
  header('refresh:1 ; url=login.php');
  die();
}

//create query
$query1="select * FROM machines
WHERE category='roller'";
$query1_run=mysqli_query($conn,$query1);

$query2="select * FROM machines
WHERE category='paver'";
$query2_run=mysqli_query($conn,$query2);

$query3="select * FROM machines
WHERE category='excavator'";
$query3_run=mysqli_query($conn,$query3);

$query4="select * FROM machines
WHERE category='payloader'";
$query4_run=mysqli_query($conn,$query4);

$query5="select * FROM machines
WHERE category='truck'";
$query5_run=mysqli_query($conn,$query5);



?>

<!DOCTYPE html>
<html>
<head>
	<title>Machine Category</title>
	<style type="text/css">
		#main{
			padding-left: 20%;

		}
		
		h3{
			text-align: center;
			font-family: "calibri", Garamond, 'Comic Sans MS';
		}
		b{
			text-align: center;
			font-family: "calibri", Garamond, 'Comic Sans MS';
			font-size: 1.4em;
		}
		#sectionhead,#btn{
			border: 1px solid grey;
			padding: 5px;
			box-shadow: 5px 5px #888888;
			border-radius: 5px;
			background: -moz-linear-gradient(90deg, rgba(255,255,255,1) 14%, rgba(255,255,255,1) 84%, rgba(0,0,0,1) 100%); /* ff3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0,0,0,1)), color-stop(16%, rgba(255,255,255,1)), color-stop(86%, rgba(255,255,255,1))); /* safari4+,chrome */
			background: -webkit-linear-gradient(90deg, rgba(255,255,255,1) 14%, rgba(255,255,255,1) 84%, rgba(0,0,0,1) 100%); /* safari5.1+,chrome10+ */
			background: -o-linear-gradient(90deg, rgba(255,255,255,1) 14%, rgba(255,255,255,1) 84%, rgba(0,0,0,1) 100%); /* opera 11.10+ */
			background: -ms-linear-gradient(90deg, rgba(255,255,255,1) 14%, rgba(255,255,255,1) 84%, rgba(0,0,0,1) 100%); /* ie10+ */
			background: linear-gradient(0deg, rgba(255,255,255,1) 14%, rgba(255,255,255,1) 84%, rgba(0,0,0,1) 100%); /* w3c */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#ffffff',GradientType=0 ); /* ie6-9 */
		}
		#main li {
			padding-bottom: 15px;
			list-style: none;

		}
		#main li a{
			text-decoration:none;
			color: black;
			font-size: 1.3em; /*1em=16px*/ 
			font-family: "calibri", Garamond, 'Comic Sans MS';
		}
		#main li a:hover{
			color: black
		}
		.roller,.paver,.excavator,.payloader,.truck{
			width: 30%;
			height: 100%;
			float: left;
			padding-right: 30px;
			padding-left: 20px;
			overflow: hidden;
		}
		.roller li a,.paver li a,.excavator li a,.payloader li a,.truck li a{
			padding: 5px;
			margin-top: 10px
		}
		#head{
			height: 20%
		}
		#head .btn{
			width: 150px;
			height: 45px;
			margin-left: 43%
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
	<div id="main" style="padding-left: 23%">
		<div id="head">
			<h3 ><b>মেশিন এর প্রকারভেদ</b></h3>
					<div style="padding-left: 60%">
						<button class="btn btn-danger btn-md " data-toggle="modal" data-target="#mymodal">যোগ করুন</button>
					</div>
			
	
		</div>
	
		<br>
		<!-- roller section -->
		<!-- <div class=" roller  ">
			<h3 id="sectionhead" >Roller</h3>
			<br>
			<ul>
			<?php while($row=mysqli_fetch_assoc($query1_run)) :?>
				<li><a href="" data-toggle="modal" data-target="#kanta"><?php  echo $row['name'] ;?></a></li>
			<?php endwhile; ?>

			</ul>
		</div> -->
		<div class="row">
			<div class="col-md-4">
				<h3>Roller</h3>
				<table class=" table table-striped table-bordered" style=" ">
			<thead>

				<tr>
					<th>Sl No</th>
					<th>Sl Name</th>
					<th>Action</th>
					<!-- <th>Sl Category</th>  -->
				</tr>
			</thead>
			<tbody>
				<?php
				$query="select * from machines where category='roller' ";
				$query_run=mysqli_query($conn,$query);
				$counter =0;
				while($row=mysqli_fetch_array($query_run)){
					$counter++;
					$id=$row['id'];
					$name=$row['name'];
					// $category=$row['category'];
				
				?>
				<tr>
					<td><?php echo $counter; ?> </td>
					<td><?php echo $name; ?> </td>
					<!-- <td><?php echo $category; ?> </td> -->
					<!-- <td><input type="button" name="view" class="view_data" id="<?php echo $row['id']; ?>" value="view"  ></td> -->
					<td><button name="view" class=" btn btn-info btn-xs view_data" id="<?php echo $row['id']; ?>" >View</button></td>
				</tr>
			</tbody>
		<?php } ?>
		</table>
			</div>
			<div class="col-md-4">
				<h3>Paver</h3>
				<table class=" table table-striped table-bordered" style=" ">
					<thead>
						<tr>
							<th>Sl No</th>
							<th>Sl Name</th>
							<th>Action</th>
							<!-- <th>Sl Category</th>  -->
						</tr>
					</thead>
					<tbody>
						<?php
						$query="select * from machines where category='paver' ";
						$query_run=mysqli_query($conn,$query);
						$counter =0;
						while($row=mysqli_fetch_array($query_run)){
							$counter++;
							$id=$row['id'];
							$name=$row['name'];
							// $category=$row['category'];
						
						?>
						<tr>
							<td><?php echo $counter; ?> </td>
							<td><?php echo $name; ?> </td>
							<!-- <td><?php echo $category; ?> </td> -->
							<!-- <td><input type="button" name="view" class="view_data" id="<?php echo $row['id']; ?>" value="view"  ></td> -->
							<td><button name="view" class=" btn btn-info btn-xs view_data" id="<?php echo $row['id']; ?>" >View</button></td>
						</tr>
					</tbody>
				<?php } ?>
				</table></div>
			<div class="col-md-4">
				<h3>Excavator</h3>
				<table class=" table table-striped table-bordered" style="  ">
					<thead>
						<tr>
							<th>Sl No</th>
							<th>Sl Name</th>
							<th>Action</th>
							<!-- <th>Sl Category</th>  -->
						</tr>
					</thead>
					<tbody>
						<?php
						$query="select * from machines where category='excavator' ";
						$query_run=mysqli_query($conn,$query);
						$counter =0;
						while($row=mysqli_fetch_array($query_run)){
							$counter++;
							$id=$row['id'];
							$name=$row['name'];
							// $category=$row['category'];
						
						?>
						<tr>
							<td><?php echo $counter; ?> </td>
							<td><?php echo $name; ?> </td>
							<!-- <td><?php echo $category; ?> </td> -->
							<!-- <td><input type="button" name="view" class="view_data" id="<?php echo $row['id']; ?>" value="view"  ></td> -->
							<td><button name="view" class=" btn btn-info btn-xs view_data" id="<?php echo $row['id']; ?>" >View</button></td>
						</tr>
					</tbody>
				<?php } ?>
				</table></div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-md-4">
				<h3>Payloader</h3>
				<table class=" table table-striped table-bordered" style=" ">
					<thead>
						<tr>
							<th>Sl No</th>
							<th>Sl Name</th>
							<th>Action</th>
							<!-- <th>Sl Category</th>  -->
						</tr>
					</thead>
					<tbody>
						<?php
						$query="select * from machines where category='payloader' ";
						$query_run=mysqli_query($conn,$query);
						$counter =0;
						while($row=mysqli_fetch_array($query_run)){
							$counter++;
							$id=$row['id'];
							$name=$row['name'];
							// $category=$row['category'];
						
						?>
						<tr>
							<td><?php echo $counter; ?> </td>
							<td><?php echo $name; ?> </td>
							<!-- <td><?php echo $category; ?> </td> -->
							<!-- <td><input type="button" name="view" class="view_data" id="<?php echo $row['id']; ?>" value="view"  ></td> -->
							<td><button name="view" class=" btn btn-info btn-xs view_data" id="<?php echo $row['id']; ?>" >View</button></td>
						</tr>
					</tbody>
			<?php } ?>
			</table>
		</div>
		<div class="col-md-4">
				<h3>Truck</h3>
				<table class=" table table-striped table-bordered" style=" ">
			<thead>
				<tr>
					<th>Sl No</th>
					<th>Sl Name</th>
					<th>Action</th>
					<!-- <th>Sl Category</th>  -->
				</tr>
			</thead>
			<tbody>
				<?php
				$query="select * from machines where category='truck' ";
				$query_run=mysqli_query($conn,$query);
				$counter =0;
				while($row=mysqli_fetch_array($query_run)){
					$counter++;
					$id=$row['id'];
					$name=$row['name'];
					// $category=$row['category'];
				
				?>
				<tr>
					<td><?php echo $counter; ?> </td>
					<td><?php echo $name; ?> </td>
					<!-- <td><?php echo $category; ?> </td> -->
					<!-- <td><input type="button" name="view" class="view_data" id="<?php echo $row['id']; ?>" value="view"  ></td> -->
					<td><button name="view" class=" btn btn-info btn-xs view_data" id="<?php echo $row['id']; ?>" >View</button></td>
				</tr>
			</tbody>
		<?php } ?>
		</table>
	</div>
	<div class="col-md-4">
				<h3>Others Category</h3>
				<table class=" table table-striped table-bordered" style=" ">
			<thead>
				<tr>
					<th>Sl No</th>
					<th>Sl Name</th>
					<th>Action</th>
					<!-- <th>Sl Category</th>  -->
				</tr>
			</thead>
			<tbody>
				<?php
				$query="select * from machines where category='other' ";
				$query_run=mysqli_query($conn,$query);
				$counter =0;
				while($row=mysqli_fetch_array($query_run)){
					$counter++;
					$id=$row['id'];
					$name=$row['name'];
					// $category=$row['category'];
				
				?>
				<tr>
					<td><?php echo $counter; ?> </td>
					<td><?php echo $name; ?> </td>
					<!-- <td><?php echo $category; ?> </td> -->
					<!-- <td><input type="button" name="view" class="view_data" id="<?php echo $row['id']; ?>" value="view"  ></td> -->
					<td><button name="view" class=" btn btn-info btn-xs view_data" id="<?php echo $row['id']; ?>" >View</button></td>
				</tr>
			</tbody>
		<?php } ?>
		</table>
	</div>
		</div>
		
	</div>
</body>
</html>



<!-- Add machine Modal start -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<form action="" method="POST">
    		<div class="modal-header">
        	<h3 class="modal-title" id="mymodallabel">Add Machines</h3>
     		</div>
      		<div class="modal-body">
      	 		<div class="from-group">
      	 			<label>Enter machine name</label>
      	 			<input type="text" name="name" class="form-control" id="name" placeholder="enter machine name">
      	 			<label id="lblname" style="color: red"></label>
      	 		</div>
      	 		<!-- <div class="from-group">
      	 			<label>Enter category</label>
      	 			<input type="text" name="category" class="form-control" id="category" placeholder="enter category">
      	 			<label id="lblcategory" style="color: red"></label>
      	 		</div> -->
      	 		<div class="form-group" >
      	 			<label id="lblcategory" style="color: red"></label>
							<label>Enter category</label><br>
							<select name="category" id="category" >
								
							<?php
							$query="select name from category ";
							$query_run=mysqli_query($conn,$query);
							$row_count=mysqli_num_rows($query_run);
							while($row=mysqli_fetch_array($query_run)){
								?>
				            	<option value="<?php echo $row['name']; ?>"> <?php echo $row['name']; ?></option>
								<?php
							}
							?>
				            </select>
		          		</div>
      		</div>
      		<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="button" class="btn btn-primary" id="save">Save changes</button>
      </div>
    	</form>
    </div>
  </div>
</div>
<!--Add machine Modal end -->

<!--View data modal start -->
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Machine Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>



<script type="text/javascript">
	//insertion here
	$(document).ready(function(){

		$(document).on('click','#save',function(){
			var name=$("#name").val().trim();
			var category=$("#category").val().trim();

			if(name==""){
				$('#lblname').html("enter machine name");
			}else if(category==""){
				$('#lblcategory').html("enter machine category");
			}else{
				$.ajax({
					url:"process.php",
					type:"POST",
					data:{name:name,category:category},
					success:function(data){
						alert("1 machine added");
						$("#mymodal").modal('hide');
						location.reload();
					}
				});
			}
		});

});
	 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var view_id = $(this).attr("id");  
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{view_id:view_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });




  


</script>