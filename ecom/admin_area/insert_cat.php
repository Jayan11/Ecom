<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Insert Category</label>
    <input type="text" name="new_cat" class="form-control" id="exampleInputEmail1" style="width:500px;">
  </div>
  <button type="submit" name="add_cat" class="btn btn-info">ADD</button>
</form>

<?php
include("includes/db.php");
if(isset($_POST['add_cat'])){
$new_cat = $_POST['new_cat'];

$insert_cat = "insert into categories (cat_title) values ('$new_cat')";

$run_cat = mysqli_query($con,$insert_cat);

if($run_cat){
	
			echo"<script>alert('category has been inserted')</script>";
			echo "<script>window.open('index.php?view_cats','_self')</script>";
}
}

?>