<!DOCTYPE html>
<?php
include("includes/db.php");
?>
<html>
<head>
	<title>insert_product</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<center><h1>Insert New Post Here</h1></center>
					<form class="form-horizontal" action="insert_product.php" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label  class="col-sm-4 control-label"><h3>Product Title:</h3></label>
							<div class="col-sm-6" style="margin-left:90px; margin-top:30px;">
							  <input type="text" class="form-control" name="product_title" required>
							</div>
						</div>
						<label  class="col-sm-4 control-label"><h3>Product Category:</h3></label>
						<select name="product_cat" class="col-sm-6" style="margin-left:90px; margin-top:30px; padding:2px;">
						<option> Select a Category</option>
						 <?php
								$get_cats = "select * from categories";

								$run_cats = mysqli_query($con, $get_cats);
								
								while($row_cats=mysqli_fetch_array($run_cats)){
									$cat_id = $row_cats['cat_id'];
									
									
									$cat_title = $row_cats['cat_title'];
									echo "<option value='$cat_id'>$cat_title</option>";
									
								}
							
							?>
						</select>
						
						<label class="col-sm-4" style="margin-left:-190px"><h3>Product Brand:</h3></label>
						<select name="product_brand" class="col-sm-6" style="margin-left:340px; margin-top:-40px; padding:2px;">
						<option> Select a Brand</option>
						 <?php
								$get_brand = "select * from brand";

								$run_brand = mysqli_query($con, $get_brand);
								
								while($row_brand=mysqli_fetch_array($run_brand)){
									$brand_id = $row_brand['brand_id'];
									
									
									$brand_title = $row_brand['brand_title'];
									echo "<option value='$brand_id'>$brand_title</option>";
									
								}
							
							
							?>
						</select>
						<div class="form-group">
							<label  class="col-sm-4 control-label"><h3>Product Image:</h3></label>
							<div class="col-sm-6" style="margin-left:90px; margin-top:30px;">
							  <input type="file"  name="product_image">
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label"><h3>Product Price:</h3></label>
							<div class="col-sm-6" style="margin-left:90px; margin-top:30px;">
							  <input type="text" class="form-control" name="product_price">
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label"><h3>Product Description:</h3></label>
							<textarea class="form-control" rows="3"  name="product_desc" style="width:365px; margin-left:362px; margin-top:30px;"></textarea>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label"><h3>Product Keyword:</h3></label>
							<div class="col-sm-6" style="margin-left:90px; margin-top:30px;">
							  <input type="text" name="product_keywords" class="form-control">
							</div>
						</div>
						<button type="submit" name="insert_post" class="btn btn-default" class="col-sm-6" style="margin-left:300px; margin-top:30px;">Insert Product Now</button>
					</form>
			</div>
		</div>
	</div>
		



</body>
</html>
<?php
	global  $product_img_tmp;
	global $tmp_name;
	global $insert_pro;
	//getting the image from the fields
	if(isset($_POST['insert_post'])){
	  $product_title = $_POST['product_title'];
	  $product_cat = $_POST['product_cat'];
	  $product_brand = $_POST['product_brand'];
	  $product_price = $_POST['product_price'];
	  $product_desc = $_POST['product_desc'];
	  $product_keywords = $_POST['product_keywords'];
	  // getting the image from the fields
	  $product_image = $_FILES['product_image']['name'];
	  $product_image_tmp = $_FILES['product_image']['tmp_name'];
	  
	  move_uploaded_file($product_image_tmp,"product_images/$product_image");
	  
	 $insert_product = "insert into product (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values
	  ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
	  
		$insert_pro = mysqli_query($con, $insert_product);
		if($insert_pro){
			// to give message to customer 
			echo"<script>alert('Product has been inserted')</script>";
			echo "<script>window.open('index.php?insert_product','_self')</script>";
		}
	}
?>