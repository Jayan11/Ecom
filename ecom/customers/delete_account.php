<!DOCTYPE html>

<html>
<head>
	<title>Change password</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<style>
		
		
		#nav_color{
			background:#00FF5F;
		}		
		
		.navbar li:hover{
			background:#10c14b;
		} 
	</style>
</head>
<body>
	

	
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>DELETE ACCOUNT:</h3>
				<form class="form-horizontal" method="POST">
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" name="yes" class="btn btn-primary">YES</button>
					</div>
				  </div>
				
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" name="no" class="btn btn-danger">NO</button>
					</div>
				  </div>
				</form>
			</div>
		</div>
	</div>		
</body>
</html>

<?php
	$user = $_SESSION['customer_email'];
	if(isset($_POST['yes'])){
		$delete_customer = "delete from customers where customer_email='$user'";
		
		$run_customer = mysqli_query($con,$delete_customer);
		
		echo "<script>alert('your account is deleted')</script>";
		
		echo "<script>window.open('../home.php','_self')</script>";
	}
	
	if(isset($_POST['no'])){
		echo "<script>alert('your account is NOT deleted')</script>";
		
		echo "<script>window.open('my_account.php','_self')</script>";
		}
	
?>