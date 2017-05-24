<?php
session_start();

session_destroy();
echo "<script>alert('you are logged out')</script>";
echo "<script>window.open('login.php?logged_out=you have looged out','_self')</script>";


?>