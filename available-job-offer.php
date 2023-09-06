<?php

require 'connection.php';
session_start();
$ID = $_SESSION['seeker-id'];
//Fine Available Job Offers not applied 
$qurey4 = "SELECT job_offer_id FROM  jobapplication where job_seeker_id = '$ID'";
$result4 = mysqli_query($connect, $qurey4);
$d = '';
while ($row4 = mysqli_fetch_assoc($result4)) {
    $d .= "'";
    $d .= $row4['job_offer_id'];
    $d .= "'";
    $d .= ",";
}
$d = rtrim($d, ",");

$CountAppliedJobOffer = mysqli_num_rows($result4);

$t= $_GET['q'];
if ($CountAppliedJobOffer == 0) {

    $qurey = "SELECT  * from joboffer WHERE job_category_id = $t ";
} else {
   $qurey = "SELECT * FROM joboffer WHERE job_category_id ='$t' AND id NOT IN ($d) ";
}

$result = mysqli_query($connect, $qurey);

$json_array = array();

while ($row = mysqli_fetch_assoc($result)) {
   $json_array [] = $row;   
}

for( $i=0  ; $i <count($json_array); $i++)
{
$job_category_id =  $json_array[$i]['job_category_id'];
$qurey = "SELECT category from jobcategory WHERE id = $job_category_id ";
$result = mysqli_query($connect, $qurey);
$row = mysqli_fetch_assoc($result);
$json_array[$i]['job_category_id'] = $row['category'];  
}
for( $i=0  ; $i <count($json_array); $i++)
{
$job_provider_id =  $json_array[$i]['job_provider_id'];
$qurey = "SELECT name from  jobprovider WHERE id = $job_provider_id ";
$result = mysqli_query($connect, $qurey);
$row = mysqli_fetch_assoc($result);
$json_array[$i]['job_provider_id'] = $row['name'];
   
}

     $json = json_encode($json_array);
      header("Content-Type: text/plain");
      print $json;

?>
