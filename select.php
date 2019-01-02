<?php
require_once 'db_connect.php';

if(isset($_POST['view_id'])){
		$output = '';  
      
      $query = "SELECT * FROM machines WHERE id = '".$_POST["view_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>ID</label></td>  
                     <td width="70%">'.$row["id"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>NAME</label></td>  
                     <td width="70%">'.$row["name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>CATEGORY</label></td>  
                     <td width="70%">'.$row["category"].'</td>  
                </tr>  
                
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;

}

?>