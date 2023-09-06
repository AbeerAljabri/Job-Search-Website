<?php

require './connection.php'; 
ini_set('display_errors',1);
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $IDTOUP = $_POST['toUp'];
    $JobTitle = $_POST['job'];
    $cate = $_POST['cate'];
    $cate = trim($cate);
    $title = $_POST['title'];
    $time = $_POST['time'];
    $sal = $_POST['sal'];
    $loc = $_POST['loc'];
    $description = $_POST['description'];
    $requirements = $_POST['requirements'];
    
   
    $qurey="SELECT * FROM jobcategory WHERE category = '$cate' ";
    $result = mysqli_query($connect, $qurey) ;
    if (mysqli_num_rows($result)> 0 ){
        while ($row= mysqli_fetch_assoc($result)){
            $catID = $row['id'];
            
        }
    }
    //if categort does not exist, add new category
    else
    {
      $qurey1="SELECT * FROM jobcategory ";
      $result1 = mysqli_query($connect, $qurey1) ; 
      $numOfCategory = mysqli_num_rows( $result1);
      $catID = $numOfCategory+1;
     echo $catID; 
      $qurey2 =  "INSERT INTO `jobcategory` ( `id` ,`category`) VALUES ( '$catID' , '$cate')";
      mysqli_query($connect, $qurey2);  
    }
    
    $qurey3="UPDATE joboffer
    SET title = '$title' , full_time = '$time' ,job_category_id = '$catID'  , salary = '$sal' , location = '$loc' , description = '$description' 
    WHERE id = '$IDTOUP'";
    $result3 = mysqli_query($connect, $qurey3) ;
    
    $qurey4="UPDATE joboffer
    SET requirements = '$requirements'
    WHERE id = '$IDTOUP'";
    $result4 = mysqli_query($connect, $qurey4) ;
    echo "<SCRIPT> window.location.replace('job-offer-details.php?id=$IDTOUP')</SCRIPT>";
         
}


?>