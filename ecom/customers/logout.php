<?php
session_start();

session_destroy();

//"../" means directory in php when we wnt o come out
echo "<script>window.open('../home.php','_self')</script>";


?>