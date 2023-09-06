<?php  
session_start();
ini_set('display_errors',1);
  
 require './connection.php'; 
     
        if($connect) {
            
    $email= mysqli_real_escape_string($connect, $_POST["email"]);
    $password= mysqli_real_escape_string($connect, $_POST["psw"]);
    
    $qurey="SELECT * FROM jobseeker WHERE email_address ='$email' ";

    $result = mysqli_query($connect, $qurey) ;
     
      if (mysqli_num_rows($result)> 0 ){
     
        while ($row= mysqli_fetch_assoc($result)){
          
       
            if (password_verify($password, $row['password'])){
                $qurey="SELECT id FROM jobseeker WHERE email_address ='$email' ";
                $result = mysqli_query($connect, $qurey) ;
                 while ($row= mysqli_fetch_assoc($result)){
                   $_SESSION['seeker-id'] = $row['id']; 
                   $_SESSION['role'] = 'job seeker';
                   echo "<SCRIPT> window.location.replace('job-seeker-home.php')</SCRIPT>";
                 }      
        }
        else {
            
         echo '<script> alert("wrong password")</script>';
         echo "<SCRIPT> window.location.replace('seeker-log-in.html')</SCRIPT>";
        }
        }
    }
         else { 
            
         echo '<script> alert("Incorrect Email")</script>';
         echo "<SCRIPT> window.location.replace('seeker-log-in.html')</SCRIPT>";   
        }
        
 }
        else {
        die("Error". mysqli_connect_error()); 
        }

?>