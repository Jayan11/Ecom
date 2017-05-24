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
	
</head>
  <body>
			<table width="795" align="center">
				<!--<tr align="center">
						<!-- colspan is use for basically to give spanning between the coloumns means giving gap btween coloumns 
					<td colspan="6"><h2>View All Product</h2></td>
				<tr>--> 
				<tr align="center">
					<th>S.N</th>
					<th>Title</th>
					<th>Image</th>
					<th>Price</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
					include("includes/db.php");
					
					$get_pro = "select * from product";
					
					$run_pro = mysqli_query($con, $get_pro);
					$i = 0;
					while($row_pro=mysqli_fetch_array($run_pro) ){
						$pro_id = $row_pro['product_id'];
						$pro_title = $row_pro['product_title'];
						$pro_image = $row_pro['product_image'];
						$pro_price = $row_pro['product_price'];
						$i++;
									
				?>
				<tr>
					<td><?php  echo $i;?></td>
					<td><?php  echo $pro_title;?> </td>
					<td><img src="product_images/<?php  echo $pro_image;?>" width="60"  height="60"/></td>
					<td><?php  echo $pro_price;?></td>
					<td><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
					<td><a href="delete_pro.php?delete_pro=<?php echo $pro_id; ?>">Delete</a></td>
				
				</tr>
					<?php } ?>
			
			
			</table>
   </body>
 
 </html>