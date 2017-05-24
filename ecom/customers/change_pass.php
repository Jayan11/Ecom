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
				<h3>Change Password</h3>
				<form class="form-horizontal" method="POST">
				  
				  <div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Current Password:</label>
					<div class="col-sm-10">
					  <input type="password" class="form-control"  name="current_pass" style="width:150px;" id="inputPassword3" placeholder="Password">
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="inputPassword31" class="col-sm-2 control-label">New Password:</label>
					<div class="col-sm-10">
					  <input type="password" class="form-control" name="new_pass" style="width:150px;"id="inputPassword31" placeholder="Password">
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="inputPassword32" class="col-sm-2 control-label">Confirm Password:</label>
					<div class="col-sm-10">
					  <input type="password" class="form-control" name="new_pass_again" style="width:150px;" id="inputPassword32" placeholder="Password">
					</div>
				  </div>
				  
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" name="change_pass" class="btn btn-primary">Change Password</button>
					</div>
				  </div>
				</form>
			</div>
		</div>
	</div>		
</body>
</html>

<?php

include("includes/db.php");

		if(isset($_POST['change_pass'])){
			
			$user = $_SESSION['customer_email'];
			$current_pass = $_POST['current_pass'];
			
			$new_pass = $_POST['new_pass'];
			
			$new_again = $_POST['new_pass_again'];
			
			$sel_pass = "select * from customers where customer_pass='$current_pass' AND customer_email='$user' ";
			
			$run_pass = mysqli_query($con, $sel_pass);
			
			$check_pass = mysqli_num_rows($run_pass);
			
			if($check_pass==0){
				echo"<script>alert('your password is wrong')</script>";
				exit();
			}
			
			if($new_pass!=$new_again){
							echo"<script>alert('your password is not same')</script>";
							exit();
			}
			
			else{
				$update_pass = "update customers set customer_pass='$new_pass' where customer_email='$user'";
				$run_update = mysqli_query($con,$update_pass);
				
				echo"<script>alert('your password is updated ')</script>";
				echo"<script>window.open('my_account.php','_self')</script>";
			}
		}


?>