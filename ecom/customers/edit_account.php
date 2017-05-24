
<!DOCTYPE html>

<html>
<head>
	<title>edit_account</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	
</head>
<body>
						<?php
								
								include("includes/db.php");
								$user = $_SESSION['customer_email'];
								$get_customer = "select * from customers where customer_email='$user'";
								
								$run_customer = mysqli_query($con, $get_customer) or die("Error: " . mysqli_error($con));
								
								$row_customer = mysqli_fetch_array($run_customer);
								
								$c_id = $row_customer['customer_id'];
								$name = $row_customer['customer_name'];
								$email = $row_customer['customer_email'];
								$pass = $row_customer['customer_pass'];
								$contact = $row_customer['customer_contact'];
						
						
						?>

							<?php
									echo"
									<button type='button' class='btn btn-warning btn-lg' class='sign-up' data-toggle='modal' data-target='#signModal'><a href='#'><span class='glyphicon glyphicon-user'></span> Edit an account</a></li></button> 
										
										  <div class='modal fade' id='signModal' tabindex='-1' role='dialog' aria-labelledby='signModalLabel'>
											  <div class='modal-dialog' role='document'>
												<div class='modal-content'>
												  <div class='modal-header'>
													<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
													<h4 class='modal-title' id='signModalLabel'>Sign-Up Form</h4>
												  </div>
												  <div class='modal-body'>
														<form class='form-horizontal' action='' method='POST'>
															  <div class='form-group' method='POST'>
																<label for='inputName3' class='col-sm-2 control-label'>Name</label>
																<div class='col-sm-10'>
																  <input type='text' class='form-control' name='c_name' value='$name'  id='inputName3' placeholder='Enter Name' required>
																</div>
															  </div>
															  <div class='form-group'>
																<label for='inputEmail3' class='col-sm-2 control-label'>Email</label>
																<div class='col-sm-10'>
																  <input type='email' class='form-control' name='c_email' value='$email' id='inputEmail3' placeholder='Enter Email' required>
																</div>
															  </div>
															  <div class='form-group'>
																<label for='inputPassword3' class='col-sm-2 control-label'>Password</label>
																<div class='col-sm-10'>
																  <input type='password' class='form-control' name='c_pass' value='$pass' id='inputPassword3' placeholder='Enter Password' required >
																</div>
															  </div>
															  <div class='form-group'>
																<label for='inputnumber3' class='col-sm-2 control-label'>Contact number</label>
																<div class='col-sm-10'>
																  <input type='text' class='form-control' name='c_contact' value='$contact' id='inputnumber3' placeholder='Enter number' required >
																</div>
															  </div>
															  <div class='modal-footer'>
																<button type='submit' class='btn btn-danger' name='update' value='update'>Update</button>
															  </div>
														</form>
												  </div>
												</div>
											  </div>
										</div>   
									
										";
								
							?>
						
</body>
</html>

<?php
	if(isset($_POST['update'])){
		$ip = getIp();
		
		$customer_id = $c_id;
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		// customer_contact is not working
		$c_contact = $_POST['c_contact'];
			
		$update_c = "update customers set customer_name='$c_name', customer_email='$c_email', customer_pass='$c_pass', customer_contact='$c_contact' where customer_id='$customer_id'";
		
		$run_update = mysqli_query($con, $update_c);
		
		if($run_update){
			echo"<script>alert('your account updated')</script>";
			echo"<script>window.open('my_account.php?edit_account','_self')</script>";
		}
		}

?>
