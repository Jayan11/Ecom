
<div>
<?php
	include("includes/db.php");
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
			$product_name = $pp_price['product_title'];
			$values = array_sum($product_price);
			
			$total += $values;
			
		}
	}
		// getting the quantity
		// global $get_qty;
		$get_qty = "select * from cart where p_id='$pro_id'";
		
		$run_qty = mysqli_query($con, $get_qty);
		
		$row_qty = mysqli_fetch_array($run_qty);
		
		$qty = $row_qty['qty'];
		
		if($qty==0){
			$qty = 1;
		}
		else{
			$qty= $qty;
		}

?>


	<h2><p>PAY WITH PAYPAL:</p></h2>
	<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

	  <!-- Identify your business so that you can collect the payments. -->
	  <input type="hidden" name="business" value="business1test@shop.com">

	  <!-- Specify a Buy Now button. -->
	  <input type="hidden" name="cmd" value="_xclick">

	  <!-- Specify details about the item that buyers will purchase. -->
	  <input type="hidden" name="item_name" value="<?php echo $product_name; ?>">
	  <input type="hidden" name="item_number" value="<?php echo $pro_id; ?>">
	  <input type="hidden" name="amount" value="<?php echo $total; ?>">
	  <input type="hidden" name="quantity" value="<?php echo $qty; ?>">
	  <input type="hidden" name="currency_code" value="USD">
	  
	   <input type="hidden" name="return" value="http://www.my_shop.com/my_shop/paypal_success.php" />
		 <input type="hidden" name="cancel_return" value="http://www.my_shop.com/myshop/paypal_cancel.php">
	  <!-- Display the payment button. -->
	  <input type="image" name="submit" border="0"
	  src="http://readyshoppingcart.com/wp-content/uploads/2013/06/express-checkout-paypal.png" width="350" height="170"
	  alt="Buy Now">
	  <img alt="" border="0" width="1" height="1"
	  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

	</form>

</div>