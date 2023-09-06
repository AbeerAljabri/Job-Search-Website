
<?php
session_start();
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      

   
     // Create a connection 
    require 'connection.php';
   
    if($connect) {
 
     if (isset($_POST["fname"]) &&  isset($_POST["lname"]) && isset($_POST["age"]) &&
             isset($_POST["qualifications"]) && isset($_POST["work-experience"]) && isset($_POST["languages"])
     && isset($_POST["phone"])&& isset($_POST["email"])&& isset($_POST["psw"]) ) ;
             
   {       
    $first_name = $_POST["fname"]; 
    $last_name = $_POST["lname"]; 
    $age = $_POST["age"]; 
    $qualifications = $_POST["qualifications"]; 
    $work_experience = $_POST["work-experience"]; 
    $languages = $_POST["languages"]; 
    $phone_number= $_POST["phone"];
    $email_address = $_POST["email"];
    $password = $_POST["psw"];
    
    $sql = "Select * from jobseeker where email_address='$email_address'";
    $result = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($result); 
    
    $sqlID = "Select * from jobseeker ";
    $resultID = mysqli_query($connect, $sqlID);
    $numID = mysqli_num_rows($resultID); 
    $numID++ ;
   
 
    //check if the email is already exists or not 
    if($num == 0) {
        if( $exists == false) {
    
            $hash = password_hash($password,PASSWORD_DEFAULT);
          
             $sql =  "INSERT INTO `jobseeker` ( `id` ,`first_name` ,`last_name` ,`age` ,`qualifications` ,`work_experience` ,`languages` ,`phone_number`, `email_address`, 
                `password`) VALUES ( '$numID' , '$first_name' , '$last_name' , '$age' ,'$qualifications' ,'$work_experience' ,
    '$languages' , '$phone_number' , '$email_address'  ,'$hash')";
              mysqli_query($connect, $sql);
              $_SESSION['seeker-id'] = $numID; 
              $_SESSION['role'] = 'job seeker';
              echo "<SCRIPT> window.location.replace('job-seeker-home.php')</SCRIPT>";
                
          }
        } 
         
    }
    if($num>0) 
   {
        
       echo '<script> alert("Email not available, Enter another email")</script>';
       echo "<SCRIPT> window.location.replace('signup.html')</SCRIPT>";
   } 
    }
     } 
     
    else {
        die("Error". mysqli_connect_error()); 
    } 
  

