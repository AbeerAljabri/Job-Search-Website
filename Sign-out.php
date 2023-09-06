
<?php

session_start();
unset($_SESSION['seeker-id']);
unset($_SESSION['provider-id']);
unset($_SESSION['role']);
session_destroy();
header("location:index.php");


?>