<?php 
session_start();
unset($_SESSION['eid']);
unset($_SESSION['logged_in']);  
session_destroy();
session_write_close();
header("location: blank.html");
die;
?>