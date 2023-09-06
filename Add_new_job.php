<?php 
ini_set('display_errors',1);
require './connection.php'; 
session_start();

$ID= $_SESSION['provider-id'];




if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Category = $_POST['cate'];
    $Title = $_POST['title']; 
    $Time_type = $_POST['time'];
    $salary = $_POST['sal'];
    $Location = $_POST['loc'];
    $Description = $_POST['des'];
    $Requirments = $_POST['req'];

   $qurey="SELECT * FROM jobcategory WHERE category = '$Category' ";
    $result = mysqli_query($connect, $qurey) ;
    if (mysqli_num_rows($result)> 0 ){
        while ($row= mysqli_fetch_assoc($result)){
            $cateID = $row['id'];
            
        }
    }
    //if categort does not exist, add new category
    else
    {
      $qurey1="SELECT * FROM jobcategory ";
      $result1 = mysqli_query($connect, $qurey1) ; 
      $numOfCategory = mysqli_num_rows( $result1);
      $cateID = $numOfCategory+1;
      $qurey2 =  "INSERT INTO `jobcategory` ( `id` ,`category`) VALUES ( '$cateID' , '$Category')";
      mysqli_query($connect, $qurey2);  
    }   
 $OferrId=0;
 $query1 = "SELECT * FROM joboffer";
 $result1 = mysqli_query($connect, $query1);
 if (mysqli_num_rows($result1)> 0 ){
        while ($row= mysqli_fetch_assoc($result1)){
            $OferrId = $row['id'];
        
        }
         
        $OferrId = $OferrId + 1;
 }
 ///INSERT INTO table_name (column1, column2, column3, ...)VALUES (value1, value2, value3, ...);
    $INSERT = "INSERT INTO `joboffer` (`id`,`job_provider_id`,`job_category_id`,`title`,`full_time`,`salary`,`location`,`description`,`requirements`)
             VALUES ('$OferrId','$ID', '$cateID','$Title', '$Time_type', '$salary', '$Location', '$Description','$Requirments')";
    mysqli_query($connect, $INSERT);

    echo " <script> alert(Added successfully); </script>";
    echo "<SCRIPT> window.location.replace('job-offer-details.php?id=$OferrId')</SCRIPT>";
     
}
?>
