<?php 
session_start();
session_unset();
session_destroy();

header("location:index2.php");
exit();
?>