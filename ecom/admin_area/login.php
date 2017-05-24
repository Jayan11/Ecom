 <!DOCTYPE>
 <html>
 <head>
 <title>Login form</title>
 <link rel="stylesheet" href="styles/loginstyle.css"  media="all" />
 </head>
</body>
<!--<div class="login">
<h2 style="color:white; text-align:center;"><?php  echo @$_GET['not_admin']; ?></h2>
  <div class="photo"></div>
  <p class="name hidden" id="name">Hans Engebretsen</p>
  <div class="username-wrap"><input type="email" class="username" placeholder="Type email & hit enter" id="username-input" /></div>
  <div class="pw-box">
  <span class="flap">
    <div class="inner"></div>
    <div class="spine"></div>
    <div class="outer"></div>
  </span>
   <span class="shadow"></span>
  <input type="password" class="password" placeholder="Password" name="pass"/>
    </div>
</div>

<!--Inspiration taken from both Steven Shobert: http://codepen.io/stevenschobert/pen/kpcBK
and of course Bennet Feely: http://codepen.io/bennettfeely/pen/ErFGv-->
<div class="login">
	<h2 style="color:white; text-align:center;"><?php  echo @$_GET['not_admin']; ?></h2>
  <h1>Admin Login</h1>

    <form method="post">

      <input type="text" name="email" placeholder="Email" required="required" />

        <input type="password" name="pass" placeholder="Password" required="required" />

        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Let me in.</button>

    </form>

</div>
</body>
</html>

<?php
session_start();

include("includes/db.php");
	if(isset($_POST['login'])){
		
		$email = mysql_real_escape_string($_POST['email']); // its reduces attack by using this function
		$pass = mysql_real_escape_string($_POST['pass']);
		
		$sel_user = "select * from admins where user_email='$email' AND user_pass='$pass'";
		
		$run_user = mysqli_query($con, $sel_user);
		
		$check_user = mysqli_num_rows($run_user);
		
		if($check_user==0){
			echo "<script>alert('password or email is wrong')</script>";
		}
		else{
				
			$_SESSION['user_email']=$email;
			echo "<script>window.open('index.php?logged_in=you have successfully Logged in','_self')</script>";
		}
	}


?>