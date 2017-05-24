<?php



// to make connection through data base
	$con  = mysqli_connect("localhost","root","","ecommerce");

	
//getting the user ip address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
	
//getting the shopping cart
function cart(){
	if(isset($_GET['add_cart'])){
		global $con;
		$ip = getIp();
		$pro_id = $_GET['add_cart'];
		
		$check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
		$run_check = mysqli_query($con , $check_pro);
		if(mysqli_num_rows($run_check)>0){
			echo"";
		}
		else{
			$insert_pro = "insert into cart (p_id,ip_add) values('$pro_id','$ip')";
			$run_pro = mysqli_query($con, $insert_pro);
			echo"<script>window.open('home.php','_self')</script>";
		}
	}
}
//getting the total added items
function total_items(){
		if(isset($_GET['add_cart'])){
			global $con;
			
			$ip = getIp();
			
			$get_items = "select * from cart where ip_add='$ip'";
			$run_items = mysqli_query($con, $get_items);
			
			$count_items = mysqli_num_rows($run_items);
		}
			else{
				global $con;
				$ip = getIp();
			
				$get_items = "select * from cart where ip_add='$ip'";
				$run_items = mysqli_query($con, $get_items);
				
				$count_items = mysqli_num_rows($run_items);
				
			}
			 echo $count_items;
		
}

//getting the total price
function total_price(){
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
			
			$values = array_sum($product_price);
			
			$total += $values;
			
		}
	}
	echo $total;
}

// getting the categories
function getCats(){
			global $con;
			$get_cats = "select * from categories";

			$run_cats = mysqli_query($con, $get_cats);
			
			while($row_cats=mysqli_fetch_array($run_cats)){
				$cat_id = $row_cats['cat_id'];
				
				
				$cat_title = $row_cats['cat_title'];
				echo "<li class='list-group-item'style='height:49px'><a href='home.php?cat=$cat_id'>$cat_title</a></li>";
				
			}
			

}


// getting the brands
function getbrand(){
			global $con;
			$get_brand = "select * from brand";

			$run_brand = mysqli_query($con, $get_brand);
			
			while($row_brand=mysqli_fetch_array($run_brand)){
				$brand_id = $row_brand['brand_id'];
				
				
				$brand_title = $row_brand['brand_title'];
				echo "<li class='list-group-item' style='height:49px'><a href='home.php?brand=$brand_id'>$brand_title</a></li>";
				
			}
			

}


function getpro(){
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
	global $con;
	// "random function" use so thats y we have random pictures in a display
	$get_pro = "select * from product order by RAND() LIMIT 0,6";
	
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
						
						<h4><p style='text-align:center'><b> price: $ $pro_price<b></p></h4>
						
						<a href='detail.php?pro_id=$pro_id' class='btn btn-info btn-xs'  role='button'  style='margin-left:20px'>DETAILS</a>
						
						<a href='home.php?add_cart=$pro_id' class='btn btn-danger btn-xs'  role='button' style='float:right' >ADD TO CART</a>
					</div>
				";
		
	}
		}
	
	}
}


function getbrandpro(){
	if(isset($_GET['brand'])){
		$brand_id = $_GET['brand'];
	global $con;
	
	$get_brand_pro = "select * from product where product_brand='$brand_id'";
	
	$run_brand_pro = mysqli_query($con, $get_brand_pro) or die("Error: " . mysqli_error($con));
	
		while($row_brand_pro = mysqli_fetch_array($run_brand_pro)){
				$pro_id = $row_brand_pro['product_id'];
				$pro_cat = $row_brand_pro['product_cat'];
				$pro_brand = $row_brand_pro['product_brand'];
				$pro_title = $row_brand_pro['product_title'];
				$pro_price = $row_brand_pro['product_price'];
				$pro_image = $row_brand_pro['product_image'];
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
}


function getcatpro(){
	if(isset($_GET['cat'])){
		$cat_id = $_GET['cat'];
	global $con;
	
	$get_cat_pro = "select * from product where product_cat='$cat_id'";
	
	$run_cat_pro = mysqli_query($con, $get_cat_pro) or die("Error: " . mysqli_error($con));
	
		while($row_cat_pro = mysqli_fetch_array($run_cat_pro)){
				$pro_id = $row_cat_pro['product_id'];
				$pro_cat = $row_cat_pro['product_cat'];
				$pro_brand = $row_cat_pro['product_brand'];
				$pro_title = $row_cat_pro['product_title'];
				$pro_price = $row_cat_pro['product_price'];
				$pro_image = $row_cat_pro['product_image'];
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
}

?>