<?php
include("includes/db.php");
// retrival of category in these first php 
if(isset($_GET['edit_cat'])){
	$cat_id = $_GET['edit_cat'];
	
	$get_cat = "select * from categories where cat_id = '$cat_id'";
	$run_cat = mysqli_query($con,$get_cat);
	
	$row_cat = mysqli_fetch_array($run_cat);
	
	$cat_id = $row_cat['cat_id'];
	
	$cat_title = $row_cat['cat_title'];
}


?>

<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Insert Category</label>
    <input type="text" name="new_cat" class="form-control" value="<?php echo $cat_title; ?>"id="exampleInputEmail1" style="width:500px;">
  </div>
  <button type="submit" name="update_cat" class="btn btn-info">Update category</button>
</form>

<?php
// inserting the categories
include("includes/db.php");
if(isset($_POST['update_cat'])){
$update_id = $cat_id;

$new_cat = $_POST['new_cat'];

$update_cat = "update categories set cat_title='$new_cat' where cat_id='$update_id'";

$run_cat = mysqli_query($con,$update_cat);

if($run_cat){
	
			echo"<script>alert('category has been updated')</script>";
			echo "<script>window.open('index.php?view_cat','_self')</script>";
}
}

?>