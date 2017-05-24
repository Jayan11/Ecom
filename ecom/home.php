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
			<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" style="padiing:2px;"></span></button>
		  </form>
			<ul class="nav navbar-nav navbar-right">
			<li>
				<?php
									if(!isset($_SESSION['customer_email'])){
										echo "<a href='checkout.php' style='color:white;'>Login</a>";
										
									}
									else{
										echo "<a href='logout.php' style='color:white;'>Logout</a>";
									}
								
								
				?>
			
			
			</li>
			</ul>
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
							<?php getpro(); ?>
							<?php getcatpro(); ?>
							<?php getbrandpro(); ?>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>		
</body>
</html>