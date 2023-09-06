
<?php
require 'connection.php';
$id = 0;
if(isset($_POST['id'])){
   $id = mysqli_real_escape_string($connect,$_POST['id']);
}
if($id > 0){

 
    // Delete record
      $qurey1 = "DELETE FROM jobapplication WHERE job_offer_id =$id" ;
      $result1 = mysqli_query($connect, $qurey1) ;
        
        
       $qurey = "DELETE FROM joboffer WHERE id =$id" ;
       $result = mysqli_query($connect, $qurey) ;
    echo 1;
    exit;

}

echo 0;
exit;



 ?>






<?php 
/*
require 'connection.php';
if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['DeleteButton']))
    {
      $toDelet = $_GET['DeleteButton'];
      $qurey1 = "DELETE FROM jobapplication WHERE job_offer_id =$toDelet" ;
      $result1 = mysqli_query($connect, $qurey1) ;
        
        
       $qurey = "DELETE FROM joboffer WHERE id =$toDelet" ;
       $result = mysqli_query($connect, $qurey) ;
       header("Refresh:0; url='job-provider-home.php'");
    }*/
  ?>