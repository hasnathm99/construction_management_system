<?php
require 'layout_page.php';
require_once 'db_connect.php';

if(!isset($_SESSION['user_id'])){
  echo '<h2 style="color:#C9302C">Log in First<h2>';
  header('refresh:1 ; url=login.php');
  die();
}

if(isset($_POST['customer_name']) and isset($_POST['address']) and isset($_POST['site']) and isset($_POST['mob_no']) and isset($_POST['machine']) and isset($_POST['date']) and isset($_POST['status'])  ){
	
	date_default_timezone_set('Asia/Dhaka');
	$customer_name=$_POST['customer_name'];
	$address=$_POST['address'];
	$site=$_POST['site'];
	$mob_no=$_POST['mob_no'];
	$machine=$_POST['machine'];
	$date=$_POST['date'];
	$status=$_POST['status'];

	if(!empty($customer_name) and !empty($address) and !empty($site) and !empty($mob_no) and !empty($machine) and !empty($date) and !empty($status) ){
		$query="insert into  rent_status(customer_name,address,site,mob_no,machine,date,status) values('$customer_name', '$address', '$site', '$mob_no', '$machine', '$date', '$status')";
		$query_run=mysqli_query($conn,$query);
		if($query_run){
			// echo '<h2 style="color:#C9302C">Information Added Successfully<h2>';
			$message="information added succesfully";
			header('refresh:5 ; url=rent_equipment.php');
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
	<title>Rent Equipment</title>
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
		
		select{
            width: 30%;
            height: 30px;
            border-radius: 3px;

        }
        #ancor{
        	color: black;
        	text-decoration: none;

        }
	</style>

</head>
<body>
<!--Main Content Start-->
	<div id="main">
		<div style="width: 90%; ">
			<h3> <i class="fas fa-retweet"></i> Rent Equipment Entry</h3>
			<hr>
		</div>
		<br>
		<div class="panel panel-default" style="width: 90%;">
    		<div class="panel-heading" >
    			<h3>বর্ণনা</h3>
    		</div>
  			<div class="panel-body">
  				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
					<div class="row">
						<div class="col-lg-5">
							<div class="form-group">
		                        <label>গ্রহণকারী নাম</label>
		                        <input type="text" name="customer_name" class="form-control"  required>
	                    	</div>
		                    <div class="form-group ">
		                        <label>গ্রহণকারী ঠিকানা</label>
		                        <input type="text" name="address" class="form-control" required>
		                    </div>
		                    <div class="form-group ">
		                        <label>সাইটের নাম</label>
		                        <input type="text" name="site" class="form-control" required>
		                    </div>
		                    <div class="form-group" >
		                        <label>মোবাইল নম্বর</label>
		                        <input type="number" name="mob_no"  class="form-control"  required>
		                    </div>                  
		                    
								
						</div>
						<div class="col-lg-5">
							<div class="form-group" >
	                            <label>যন্ত্রের নাম</label><br>
	                            <select name="machine" >
	                                <option value="NULL" >Select Machine</option>
	                            <?php
	                            $query="select distinct name from machines ";
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
		                    <div class="form-group" >
		                        <label>তারিখ</label>
		                        <input type="date" name="date"  class="form-control"  required>
		                    </div>
		                    <div class="form-group">
		                    	<label>Select Equipment Status</label><br>
		                    	<input type="radio" name="status" value=1 checked> Yes
		                    	<input type="radio" name="status" value=2> No
		                    </div>

		                    <div style="padding-left: 50%">
		                    	<button type="submit" name="submit" class="btn btn-success pull-right" > <i class="fas fa-plus"></i> Save</button>
		                    <button class="btn btn-danger "><a href="index.php"  id="ancor" ><i class="fas fa-long-arrow-alt-left"></i> Back</a></button>
		                    </div>
						</div>
						
					</div>
        		</form>
  			</div>
  		</div>
	</div>
</body>
</html>

