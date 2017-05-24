<?php
include("includes/db.php");
// retrival of category in these first php 
if(isset($_GET['edit_brand'])){
	$brand_id = $_GET['edit_brand'];
	
	$get_brand = "select * from brand where brand_id = '$brand_id'";
	$run_brand = mysqli_query($con,$get_brand);
	
	$row_brand = mysqli_fetch_array($run_brand);
	
	$brand_id = $row_brand['brand_id'];
	
	$brand_title = $row_brand['brand_title'];
}



?>

<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Update Brand</label>
    <input type="text" name="new_brand" class="form-control" id="exampleInputEmail1" value="<?php echo $brand_title ?>" style="width:500px;">
  </div>
  <button type="submit" name="update_brand" class="btn btn-info">Update Brand</button>
</form>

<?php

if(isset($_POST['update_brand'])){
$update_id = $brand_id;	
$new_brand = $_POST['new_brand'];

$update_brand = "update brand set brand_title='$new_brand' where brand_id='$update_id' ";

$run_update = mysqli_query($con,$update_brand);

if($run_update){
	
			echo"<script>alert('brand has been updated')</script>";
			echo "<script>window.open('index.php?view_brand','_self')</script>";
}
}

?>