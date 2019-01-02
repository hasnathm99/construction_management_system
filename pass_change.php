<?php
require 'layout_page.php';
require_once 'db_connect.php';


if(!isset($_SESSION['user_id'])){
  echo '<h2 style="color:#C9302C">Log in First<h2>';
  header('refresh:1 ; url=login.php');
  die();
}
$id=$_GET['id']; 
//cant use this id in later php code

if(isset($_POST['name']) and isset($_POST['new_password'])){

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $id=$_GET['id'];
  $new_password=test_input($_POST["new_password"]);
  $name=test_input($_POST["name"]);

  if(!empty($name) and !empty($new_password) ){

      $query="update users set name='$name' , password='$new_password' where id=1 ";
      $query_run=mysqli_query($conn,$query);
      if($query_run){
        $message='information updated successfully';
        header('refresh:1 ; url=profile.php');
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
  <title>Process page</title>

</head>
<body>
  <div id="main">
    <div style="width: 90%; ">
      <h3> <i class="fas fa-users"></i> তথ্য পরিবর্তন</h3>
      <hr>
      <h4>Your Id No: <?php echo $id; ?></h4>
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
                  <label>নতুন পাসওয়ার্ড</label>
                  <input type="text" name="new_password" class="form-control"  required >
                </div>

            </div>
            <div class="col-lg-4" id="btn" style="padding-left: 10%">
              <button  type="" name="submit" class="btn btn-danger btn-md" > <i class="fas fa-long-arrow-alt-left"></i> <a href="profile.php" style="color: black;text-decoration: none">Back</a></button>
              <button type="submit" name="submit" class="btn btn-success" > <i class="fas fa-plus"></i> Save</button>
            </div>
              
            </form>
        </div>
      </div>
  </div>

</body>
</html>