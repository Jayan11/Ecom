<!DOCTYPE html>
<?php
include("includes/db.php");
?>

<?php
	
	if(isset($_GET['edit_pro'])){
		
		$get_id = $_GET['edit_pro'];
		$get_pro = "select * from product where product_id = '$get_id'";
		
		
		$run_pro = mysqli_query($con, $get_pro);
		$i = 0;
		$row_pro=mysqli_fetch_array($run_pro);
				
			$pro_id = $row_pro['product_id'];
			$pro_title = $row_pro['product_title'];
			$pro_image = $row_pro['product_image'];
			$pro_price = $row_pro['product_price'];
			$pro_desc = $row_pro['product_desc'];
			$pro_keywords = $row_pro['product_keywords'];
			$pro_cat = $row_pro['product_cat'];
			$pro_brand = $row_pro['product_brand'];
			
			// its not working see lecture 55 or i can remove if I do not need any dynamic category or 
			$get_cat = "select * from the categories where cat_id='$pro_cat'";
			
			$run_cat = mysqli_query($con, $get_cat) ;
			
			$row_cat = mysqli_fetch_array($run_cat);
			
			$category_title = $row_cat['cat_title'];
			
			
			$get_brand = "select * from the brand where brand_id='$pro_brand'";
			
			$run_brand = mysqli_query($con, $get_brand) ;
			
			$row_brand = mysqli_fetch_array($run_brand) ;
			
			$brand_title = $row_brand['brand_title'];
		

}
?>

<html>
<head>
	<title>Update_product</title>
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
				<center><h1>Update New Post Here</h1></center>
					<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label  class="col-sm-4 control-label"><h3>Product Title:</h3></label>
							<div class="col-sm-6" style="margin-left:90px; margin-top:30px;">
							  <input type="text" class="form-control" name="product_title" value="<?php echo $pro_title; ?>">
							</div>
						</div>
						<label  class="col-sm-4 control-label"><h3>Product Category:</h3></label>
						<select name="product_cat" class="col-sm-6" style="margin-left:90px; margin-top:30px; padding:2px;">
						<option> <?php echo $category_title; ?></option>
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
						<option> <?php echo $brand_title; ?></option>
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
							  <input type="file"  name="product_image"><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60" />
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label"><h3>Product Price:</h3></label>
							<div class="col-sm-6" style="margin-left:90px; margin-top:30px;">
							  <input type="text" class="form-control" name="product_price" value="<?php echo $pro_price; ?>">
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label"><h3>Product Description:</h3></label>
							<textarea class="form-control" rows="3"  name="product_desc" style="width:365px; margin-left:362px; margin-top:30px;"><?php echo $pro_desc; ?></textarea>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label"><h3>Product Keyword:</h3></label>
							<div class="col-sm-6" style="margin-left:90px; margin-top:30px;">
							  <input type="text" name="product_keywords" class="form-control" value="<?php echo $pro_keywords; ?>">
							</div>
						</div>
						<button type="submit" name="update_product" class="btn btn-default" class="col-sm-6" style="margin-left:300px; margin-top:30px;">Update Product Now</button>
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
	if(isset($_POST['update_product'])){
		$update_id = $pro_id;
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
	  
	 $update_product = "update product set product_cat='$product_cat',product_brand='$product_brand',product_title='$product_title',product_price='$product_price',product_desc=
	 '$product_desc',product_image='$product_image',product_keywords='$product_keywords' where product_id='$update_id'";
	  
		$run_product = mysqli_query($con, $update_product);
		if($update_product){
			// to give message to customer 
			echo"<script>alert('Product has been updated')</script>";
			echo "<script>window.open('index.php?view_product','_self')</script>";
		}
	}
?>