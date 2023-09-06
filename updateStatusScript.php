<?php


require 'connection.php'; 

$id = 0;
if(isset($_GET['status'])){
   $updateing  = mysqli_real_escape_string($connect,$_GET['status']);
   $appId  = mysqli_real_escape_string($connect,$_GET['id1']);
}
if($updateing > 0){


$qurey1="SELECT id FROM applicationstatus WHERE status = '$updateing' "; 
$result1 = mysqli_query($connect, $qurey1) ;

if (mysqli_num_rows($result1)> 0 ){
        while ($row= mysqli_fetch_assoc($result1)){
            $idAPS = $row['id'];
}}

$qurey="UPDATE jobapplication
SET application_status_id = '$idAPS'
WHERE id = '$appId'";
$result = mysqli_query($connect, $qurey) ;

 echo 1;
 exit;
}

  echo 0;
 exit;   

   


?>