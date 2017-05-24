<?php
session_start();

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=you are not an Admin!','_self')</script>";
}
else{
	


?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--<link rel="stylesheet" type="text/css" href="styles/style.css">-->
	<style>
		#panel_margin{
			margin-top:10px;
			
		}
	
	
	</style>
</head>
  <body>
  
				<div class="container">
						<div class="row" id="panel_margin">
							<div class="col-md-9">
								<div class="panel panel-primary">
								  <div class="panel-heading" style="text-align:center">ADMIN-PANEL</div>
									  <div class="panel-body" style="height:710px;">
											
											<?php
												if(isset($_GET['insert_product'])){
													include("insert_product.php");
												  }
												  
												  if(isset($_GET['view_product'])){
													include("view_product.php");
												  }
											
											  
												  if(isset($_GET['edit_pro'])){
													include("edit_pro.php");
												  }
												
												 if(isset($_GET['insert_cat'])){
													include("insert_cat.php");
												  }
												  
												   if(isset($_GET['view_cat'])){
													include("view_cat.php");
												  }
												  
												   if(isset($_GET['edit_cat'])){
													include("edit_cat.php");
												  }
												  
												   if(isset($_GET['insert_brand'])){
													include("insert_brand.php");
												  }
												  
												   if(isset($_GET['view_brand'])){
													include("view_brand.php");
												  }
												  
												  if(isset($_GET['edit_brand'])){
													include("edit_brand.php");
												  }
												
												  if(isset($_GET['view_customer'])){
													include("view_customer.php");
												  }
											?>
									  </div>
								</div>
							</div>
						
							<div class="col-md-3">
								<div class="list-group">
									<a href="index.php?insert_product" class="list-group-item active">Insert New Product</a>
										<a href="index.php?view_product" class="list-group-item">View all product</a>
										<a href="index.php?insert_cat" class="list-group-item">Insert New Category</a>
										<a href="index.php?view_cat" class="list-group-item">View All Category</a>
										<a href="index.php?insert_brand" class="list-group-item">Insert New Brand</a>
										<a href="index.php?view_brand" class="list-group-item">View All Brand</a>
										<a href="index.php?view_customer" class="list-group-item">View Customer</a>
										<a href="index.php?view_order" class="list-group-item">View Order</a>
										<a href="index.php?view_payments" class="list-group-item">View Payments</a>
										<a href="logout.php" class="list-group-item">Admin Logout</a>
								</div>
							</div>
						</div>
				</div>
				
	
	
	</body>
 
 </html>
 
<?php } ?>