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
					<th>Name</th>
					<th>Email</th>
					<th>Contact</th>
					<th>Delete</th>
				</tr>
				<?php
					include("includes/db.php");
					
					$get_c = "select * from customers";
					
					$run_c = mysqli_query($con, $get_c);
					$i = 0;
					while($row_c=mysqli_fetch_array($run_c) ){
						$c_id = $row_c['customer_id'];
						$c_name = $row_c['customer_name'];
						$c_email = $row_c['customer_email'];
						$c_contact = $row_c['customer_contact'];
						// customer image can be done but i did not
						$i++;
									
				?>
				<tr>
					<td><?php  echo $i;?></td>
					<td><?php  echo $c_name;?> </td>
					<!--<td><img src="product_images/<?php // echo $pro_image;?>" width="60"  height="60"/></td>-->
					<td><?php  echo $c_email;?></td>
					<td><?php  echo $c_contact;?></td>
					<td><a href="delete_c.php?delete_c=<?php echo $c_id; ?>">Delete</a></td>
				
				</tr>
					<?php } ?>
			
			
			</table>
   </body>
 
 </html>