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
					<th>Brand Id</th>
					<th>Brand Title</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
					include("includes/db.php");
					
					$get_brand = "select * from brand";
					
					$run_brand = mysqli_query($con, $get_brand);
					$i = 0;
					while($row_brand=mysqli_fetch_array($run_brand) ){
						$brand_id = $row_brand['brand_id'];
						$brand_title = $row_brand['brand_title'];
						$i++;
									
				?>
				<tr>
					<td><?php  echo $i;?></td>
					<td><?php  echo $brand_title;?> </td>
					<td><a href="index.php?edit_brand=<?php echo $brand_id; ?>">Edit</a></td>
					<td><a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?>">Delete</a></td>
				
				</tr>
					<?php } ?>
			
			
			</table>
   </body>
 
 </html>