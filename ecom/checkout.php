<!DOCTYPE html>
<?php 
	session_start();
	Include("functions/function.php");
	Include("includes/db.php");
	?>
<html>
<head>
	<title>checkout</title>
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
	<nav class="navbar navbar-default" id="nav_color">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="home.php">
				Brand
			<!--<img src="images/logo.gif" />-->
		  </a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<li><a href="home.php" style="color:white">Home<span class="sr-only">(current)</span></a></li>
			<li><a href="all_product.php" style="color:white">All product</a></li>
			<li><a href="customers/my_account.php" style="color:white">My Account</a></li>
			<li><a href="cart.php" style="color:white">Shoping Cart</a></li>
			<li><a href="#" style="color:white">Contact us</a></li>
		  </ul>
		  <form method="get" action="result.php" enctype="multipart/form-data" class="navbar-form navbar-right">
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="Search The Product">
			</div>
			<button type="submit" class="btn btn-default">Search</button>
		  </form>
			
		</div>   <!-- /.navbar-collapse -->
	  </div>     <!-- /.container-fluid -->
	</nav>

	
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="well" id="wel" style="height:720px">
					<div class="col-md-3">
						<ul class="list-group" >
						  <li class="list-group-item" id="item_list1"  ><center>Categories</center></li>
							<?php getcats(); ?>
						  <li class="list-group-item" id="item_list1" ><center>Brands</center></li>
						  	<?php getbrand(); ?>			 
						</ul>
					</div>
					<div class="col-md-9">
						<div class="well" id="well1">
						<?php cart(); ?>
							<span style="float:right; font-size:18px; line-height:8px;">
								<?php
									if(isset($_SESSION['customer_email'])){
											echo $_SESSION['customer_email'];
											
									}
									else{
										echo "<b>Welcome guest:</b>";
									}
								?>
								
								
								<p style="float:right">Shopping Cart- Total Item:<?php  total_items();?>   Total Price: $<?php total_price(); ?> <a href="cart.php">Go To Cart</a></p>
								
							</span>
						</div>
						<div class="well" id="well2" style="height:600px">
						<div id="product_box" >
							<?php
								if(!isset($_SESSION['customer_email'])){
									
									echo "<h3>Please >> login or register to buy..!!!</h3>
									<br>
									<button type='button' class='btn btn-warning btn-lg' class='login' data-toggle='modal' data-target='#loginModal'><a href='#' ><span class='glyphicon glyphicon-log-in'></span> LOGIN</a></button>
											<div class='modal fade' id='loginModal' tabindex='-1' role='dialog' aria-labelledby='loginModalLabel'>
											  <div class='modal-dialog' role='document'>
												<div class='modal-content'>
												  <div class='modal-header'>
													<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
													<h4 class='modal-title' id='loginModalLabel'>Login Form</h4>
												  </div>
												  <div class='modal-body'>
														<form class='form-horizontal' method='post'>
														  <div class='form-group'>
															<label for='inputEmail3' class='col-sm-2 control-label'>Email</label>
															<div class='col-sm-10'>
															  <input type='email' class='form-control' id='inputEmail3' name='email' placeholder='Email'>
															</div>
														  </div>
														  <div class='form-group'>
															<label for='inputPassword3' class='col-sm-2 control-label'>Password</label>
															<div class='col-sm-10'>
															  <input type='password' class='form-control' id='inputPassword3' name='pass' placeholder='Password'>
															</div>
														  </div>
														  <div class='form-group'>
															<div class='col-sm-offset-2 col-sm-10'>
															  <div class='checkbox'>
																<label>
																  <input type='checkbox'> Remember me
																</label>
															  </div>
															</div>
														  </div>
														  
													
												</div>
												  <div class='modal-footer'>
														<div class='form-group'>
															<div class='col-sm-offset-2 col-sm-10'>
															  <a href='#'>Forget Password?</a>
															  <button type='submit' class='btn btn-default' name='login'>Sign in</button>
															</div>
														  </div>
												  </div>
												  </form>
												</div>
											  </div>
											</div>   
																
										
									<button type='button' class='btn btn-warning btn-lg' class='sign-up' data-toggle='modal' data-target='#signModal'><a href='#'><span class='glyphicon glyphicon-user'></span> SIGN-UP</a></li></button> 
										
										  <div class='modal fade' id='signModal' tabindex='-1' role='dialog' aria-labelledby='signModalLabel'>
											  <div class='modal-dialog' role='document'>
												<div class='modal-content'>
												  <div class='modal-header'>
													<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
													<h4 class='modal-title' id='signModalLabel'>Sign-Up Form</h4>
												  </div>
												  <div class='modal-body'>
														<form class='form-horizontal' method='POST'>
															  <div class='form-group' method='POST'>
																<label for='inputName3' class='col-sm-2 control-label'>Name</label>
																<div class='col-sm-10'>
																  <input type='text' class='form-control' name='c_name' id='inputName3' placeholder='Enter Name' required>
																</div>
															  </div>
															  <div class='form-group'>
																<label for='inputEmail3' class='col-sm-2 control-label'>Email</label>
																<div class='col-sm-10'>
																  <input type='email' class='form-control' name='c_email' id='inputEmail3' placeholder='Enter Email' required>
																</div>
															  </div>
															  <div class='form-group'>
																<label for='inputPassword3' class='col-sm-2 control-label'>Password</label>
																<div class='col-sm-10'>
																  <input type='password' class='form-control' name='c_pass' id='inputPassword3' placeholder='Enter Password' required >
																</div>
															  </div>
															  <div class='form-group'>
																<label for='inputnumber3' class='col-sm-2 control-label'>Contact number</label>
																<div class='col-sm-10'>
																  <input type='text' class='form-control' name='c_contact' id='inputnumber3' placeholder='Enter number' required >
																</div>
															  </div>
															  <div class='modal-footer'>
																<button type='submit' class='btn btn-default' name='register' value='register'>Sign up</button>
															  </div>
														</form>
												  </div>
												</div>
											  </div>
										</div>   
									";
								}
								else{
									include("payment.php");
								}
							?>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>		
</body>
</html>

<?php
	if(isset($_POST['register'])){
		$ip = getIp();
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		// customer_contact is not working
		$c_contact = $_POST['c_contact'];
			
		$insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_contact) 
		values('$ip','$c_name','$c_email','$c_pass','$c_contact')";
		
		$run_c = mysqli_query($con, $insert_c);
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart);
		
		$check_cart = mysqli_num_rows($run_cart);
		
		if($check_cart==0){
			$_SESSION['customer_email']=$c_email;
			echo "<script>alert('account has been created successfullty')</script>";
			echo "<script>windows.open('customer/my_account','_self')</script>";
		}
		
		else {
			$_SESSION['customer_email']=$c_email;
			echo "<script>alert('account has been created successfullty')</script>";
			echo "<script>windows.open('checkout.php','_self')</script>";
		}
	}



?>

<?php
		if(isset($_POST['login'])){
			 
			 $c_email = $_POST['email'];
			 $c_pass = $_POST['pass'];
			 
			 $sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
			 
			 $run_c = mysqli_query($con, $sel_c);
			 
			 $check_customer = mysqli_num_rows($run_c);
			 if($check_customer==0){
				 
				 echo " <script>alert('password or email is incorrect')</script>";
				 exit();
				 }
				 
			$ip = getIp();
			
			$sel_cart = "select * from cart where ip_add='$ip'";

			$run_cart = mysqli_query($con, $sel_cart);
			
			$check_cart = mysqli_num_rows($run_cart);
			if($check_customer>0 AND $check_cart==0){
				
				$_SESSION['customer_email']=$c_email;
				echo "<script>alert('you logged in successfullty')</script>";
				echo "<script>windows.open('customer/my_account.php','_self')</script>";
				
				
			}

			else{
				
				$_SESSION['customer_email']=$c_email;
				echo "<script>alert('you logged is successfullty')</script>";
				echo "<script>windows.open('checkout.php','_self')</script>";
			}
		}

?>
