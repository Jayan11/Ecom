<?php
session_start();

?>
<html>
<head>
	<title> Payment Successful!</title>
</head>
<body>
	<h2>Welcome <?php echo $_SESSION['customer_email']; ?></h2>
	<p>Your payment was successful!</p>
	<h3><a href="my_account.php">Go To Account</h3>
</body>
</html>