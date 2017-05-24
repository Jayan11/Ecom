<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Insert Brand</label>
    <input type="text" name="new_brand" class="form-control" id="exampleInputEmail1" style="width:500px;">
  </div>
  <button type="submit" name="add_brand" class="btn btn-info">ADD</button>
</form>

<?php
include("includes/db.php");
if(isset($_POST['add_brand'])){
$new_brand = $_POST['new_brand'];

$insert_brand = "insert into brand (brand_title) values ('$new_brand')";

$run_brand = mysqli_query($con,$insert_brand);

if($run_brand){
	
			echo"<script>alert('brand has been inserted')</script>";
			echo "<script>window.open('index.php?view_brand','_self')</script>";
}
}

?>