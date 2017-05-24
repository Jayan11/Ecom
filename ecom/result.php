<!DOCTYPE html>
<?php 
	Include("functions/function.php");
?>
<html>
<head>
	<title>all_poduct</title>
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
			  <input type="text" class="form-control" name="user_query" placeholder="Search The Product">
			</div>
			<button type="submit" name="search" value="search" class="btn btn-default">Search</button>
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
				
					<div class="col-md-3" style="margin-top:10px;">
						<ul class="list-group" >
						  <li class="list-group-item" id="item_list1"  ><center>Categories</center></li>
							<?php getcats(); ?>
						  <li class="list-group-item" id="item_list1" ><center>Brands</center></li>
						  	<?php getbrand(); ?>			 
						</ul>
					</div>
					
					<div class="col-md-9" style="margin-top:10px;">
						<div class="well" id="well1" >
							<span style="float:right; font-size:18px; line-height:8px;">
								WELCOME GUEST!
								&nbsp&nbsp<p style="float:right">Shopping Cart- Total Item:   Total Price:  <a href="cart.php">Go To Cart</a></p>
								
							</span>
						</div>
						
						<div id="product_box">
							<?php
							if(isset($_GET['search'])){
								$search_query = $_GET['user_query'];
								$get_pro = "select * from product where product_keywords like'%$search_query%'";
	
								$run_pro = mysqli_query($con, $get_pro) or die("Error: " . mysqli_error($con));
								
									while($row_pro = mysqli_fetch_array($run_pro)){
											$pro_id = $row_pro['product_id'];
											$pro_cat = $row_pro['product_cat'];
											$pro_brand = $row_pro['product_brand'];
											$pro_title = $row_pro['product_title'];
											$pro_price = $row_pro['product_price'];
											$pro_image = $row_pro['product_image'];
											echo"
												<div id='product_box' style='float:left'>
													
													<h3 style='text-align:center'>$pro_title</h3>
													
													<img src='admin_area/product_images/$pro_image' width='200' height='150' style='margin-right:30px'/>
													
													<h4><p style='text-align:center'><b> $ $pro_price<b></p></h4>
													
													<a href='detail.php?pro_id=$pro_id' class='btn btn-info btn-xs'  role='button'  style='margin-left:20px'>DETAILS</a>
													
													<a href='home.php?pro_id=$pro_id' class='btn btn-danger btn-xs'  role='button' style='float:right' >ADD TO CART</a>
												</div>
											";
									
								}
							}
							?>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</div>		
</body>
</html>