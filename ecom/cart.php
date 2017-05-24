<!DOCTYPE html>
<?php 
	session_start();
	Include("functions/function.php");
?>
<html>
<head>
	<title>My cart</title>
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
								
								
								
								<p style="float:right">Shopping Cart- Total Item:<?php  total_items();?>   Total Price: $<?php total_price(); ?> <a href="home.php">BACK TO SHOP</a>
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
						
						<div id="product_box" >
							<form action="" method="post" enctype="multipart/form-data">
								<table align="center">
									<tr align="center" style="padding-left:100px">
										<th style="padding-left:100px">Remove</th>
										<th style="padding-left:100px">product(S)</th>
										<th style="padding-left:100px">Quantity</th>
										<th style="padding-left:100px">Price</th>
									</tr>
									
									<?php
									$total=0;
										global $con;
										
										$ip = getIp();
										
										$sel_price = "select * from cart where ip_add='$ip'";
										
										$run_price = mysqli_query($con, $sel_price);
										
										while($p_price=mysqli_fetch_array($run_price)){
											
											$pro_id = $p_price['p_id'];
											$pro_price = "select * from product where product_id='$pro_id'";
											$run_pro_price = mysqli_query($con, $pro_price);
											
											while($pp_price = mysqli_fetch_array($run_pro_price)){
												$product_price = array($pp_price['product_price']);
												$product_title = $pp_price['product_title'];
												$product_image = $pp_price['product_image'];
												
												$single_price = $pp_price['product_price'];
											
												$values = array_sum($product_price);
												$total += $values;
											
										
										//echo $total;
									
									?>
									<tr>
										<td style="padding-left:100px"><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/></td>
										<td style="padding-left:100px">
											
											<br>
											<img src="admin_area/product_images/<?php echo $product_image;?>" width="120" height="120"/>
										</td>
										<?php
											 global $qty;
										?>	
										
										<td style="padding-left:100px"><input type="text" size="1" name="qty" value="<?php  echo $_SESSION['qty']; ?>"/></td>
										<!-- function FOR number of quantity -->
											<?php
												if(isset($_POST['update_cart'])){
													$qty = $_POST['qty'];
													
													$update_qty = "update cart set qty='$qty'";
													
													$run_qty =  mysqli_query($con,$update_qty);
													
													//if we want the value is present or seen in text area so we use "sessions"
													
													$_SESSION['qty'] = $qty;
													
													$total = $total * $qty;
												}
											
											?>
											<td style="padding-left:100px">$<?php echo $single_price; ?></td>
									</tr>
									
										<?php } } ?>
									</table>
									
										<h3><p style="margin-top:50px; margin-left:500px;">TOTAL: $<?php echo $total; ?></p></h3>
										<button type="submit" name="update_cart" value="Update" class="btn btn-danger btn-md" style="margin-left:250px;">Update cart</button>
										<button type="submit" name="continue" value="continue" class="btn btn-danger btn-md">Continue Shopping</button>
										<a href="checkout.php"><button type="button" class="btn btn-danger btn-md">Checkout</button></a>
							</form>
							<!-- for remove any product from cart -->
							
								<?php
								// isse remove or qty update dono ho rha hai but error bhi aa rhi hai delete krte wqt kyunki function call ni kiya
								// ab mujhe function call kra ke dekhna hai 33 34 35 videos
								//function updatecart(){
										global $con;
									$ip = getIp();
									
									if(isset($_POST['update_cart'])){
										foreach($_POST['remove'] as $remove_id){
											$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
											$run_delete = mysqli_query($con, $delete_product);
											if($run_delete){
												// code for a refresh a page in javascript
												echo"<script>window.open('cart.php','_self')</script>";
											}
										}
									}
									if(isset($_POST['continue'])){
										echo"<script>window.open('home.php','_self')</script>";
									}
										echo @$up_cart = updatecart();
									//}
								?>
							</div>
						
					</div>
			
			</div>
		</div>
	</div>		
</body>
</html>