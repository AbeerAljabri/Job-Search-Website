<?php

require 'connection.php';
session_start();
$ID = $_SESSION['seeker-id'];
$t= $_POST['location'];

$qurey = "SELECT  * from joboffer WHERE job_category_id = $t ";

$result = mysqli_query($connect, $qurey);

$json_array = array();

while ($row = mysqli_fetch_assoc($result)) {
    $json_array [] = $row;
}

$json = json_encode($json_ar);
        header("Content-Type: text/plain");
        print $json;

?>

