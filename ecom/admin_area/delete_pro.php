<?php
	include("includes/db.php");
	if(isset($_GET['delete_pro'])){
	$delete_id = $_GET['delete_pro'];
	
	$delete_pro = "delete from product where product_id='$delete_id'";
	
	$run_delete = mysqli_query($con,$delete_pro);
	
	
	if($run_delete){
		echo"<script>alert('Product has been deleted')</script>";
		echo "<script>window.open('index.php?view_product','_self')</script>";
	}
	
	}



?> 