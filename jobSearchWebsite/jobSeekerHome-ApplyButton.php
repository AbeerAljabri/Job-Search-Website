<?php
require 'connection.php';
session_start();
$ID = $_SESSION['seeker-id'];

    $job_offer_id = $_GET['ApplayButton'];
    
    //number of jopApplications
    $numID = 0;
    $qurey5 = "Select * from jobapplication";
    $resultID = mysqli_query($connect, $qurey5) ;
    if (mysqli_num_rows($resultID)> 0 ){
    while ($row= mysqli_fetch_assoc($resultID)){
    $numID = $row['id'];}
    $numID = $numID + 1;
    }
   
    
     //insert into jobApplication table
    $qurey6="INSERT INTO `jobapplication` ( `id` ,`job_offer_id` ,`job_seeker_id` ,`application_status_id`) "
          . "VALUES ( '$numID' , '$job_offer_id' , '$ID' , '1') ";
    $result6 = mysqli_query($connect, $qurey6) ;
    header("Refresh:0; url='job-seeker-home.php'");   

?>

