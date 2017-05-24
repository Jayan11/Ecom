<!DOCTYPE html>
<?php 
	session_start();
	Include("functions/function.php");
	
?>
<html>
<head>
	<title>My Shop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<style>
		#product_box img{
				border:2px solid black;
				}
		
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
		  <a class="navbar-brand" href="../home.php">
				Brand
			<!--<img src="images/logo.gif" />-->
		  </a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<li><a href="../home.php" style="color:white">Home<span class="sr-only">(current)</span></a></li>
			<li><a href="../all_product.php" style="color:white">All product</a></li>
			<li><a href="../customers/my_account.php" style="color:white">My Account</a></li>
			<li><a href="../cart.php" style="color:white">Shoping Cart</a></li>
			<li><a href="#" style="color:white">Contact us</a></li>
		  </ul>
		  <form method="get" action="result.php" enctype="multipart/form-data" class="navbar-form navbar-right">
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="Search The Product">
			</div>
			<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" style="padiing:2px;"></span></button>
		  </form>
			<!--<ul class="nav navbar-nav navbar-right">
			<li><a href="#">Link</a></li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="#">Action</a></li>
				<li><a href="#">Another action</a></li>
				<li><a href="#">Something else here</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="#">Separated link</a></li>
			  </ul>
			</li>
		  </ul>-->
		</div>   <!-- /.navbar-collapse -->
	  </div>     <!-- /.container-fluid -->
	</nav>

	
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="well" id="wel" style="height:500px">
					<div class="col-md-3">
						<ul class="list-group" >
						  <li class="list-group-item" id="item_list1"  ><center>My Account</center></li>
						  
						  <?php
						  
						  $user = $_SESSION['customer_email'];
						  
								
						  ?>
							<li class="list-group-item"style="height:49px"><a href="my_account.php?my_orders">My order</a></li>
							<li class="list-group-item"style="height:49px"><a href="my_account.php?edit_account">Edit Account</a></li>
							<li class="list-group-item"style="height:49px"><a href="my_account.php?change_pass">Change Password</a></li>
							<li class="list-group-item"style="height:49px"><a href="my_account.php?delete_account">Delete Account</a></li>
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
									
								?>
								
							
								
								
								<?php
									if(!isset($_SESSION['customer_email'])){
										echo "<a href='checkout.php' style='color:orange;'>Login</a>";
										
									}
									else{
										echo "<a href='logout.php' style='color:orange;'>Logout</a>";
									}
								
								
								?>
								</p>
							</span>
						</div>
						<div class="well" id="well2" style="height:400px">
						<div id="product_box" >
							<?php
							if(!isset($_GET['my_orders'])){
									if(!isset($_GET['edit_account'])){
										if(!isset($_GET['change_pass'])){
											if(!isset($_GET['delete_account'])){
												
											}
										}
									}
							}
							?>
							
							<?php
								if(isset($_GET['edit_account'])){
									include("edit_account.php");
								}
								
								if(isset($_GET['change_pass'])){
									include("change_pass.php");
								}
								
								if(isset($_GET['delete_account'])){
									include("delete_account.php");
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