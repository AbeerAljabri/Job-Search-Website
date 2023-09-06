<?php  session_start();
ini_set('display_errors',1);
        
    require './connection.php';
       
    if($connect) {

    $username= mysqli_real_escape_string($connect, $_POST["uname"]);
    $password= mysqli_real_escape_string($connect, $_POST["psw"]);
    
    $qurey="SELECT * FROM jobprovider WHERE username ='$username' ";

     $result = mysqli_query($connect, $qurey) ;
    
    if (mysqli_num_rows($result)> 0 ){
        while ($row= mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){
                
                $qurey="SELECT id FROM jobprovider WHERE username ='$username' ";
                $result = mysqli_query($connect, $qurey) ;
                 while ($row= mysqli_fetch_assoc($result)){
                   $_SESSION['provider-id'] = $row['id']; 
                   $_SESSION['role'] = 'job provider';
                   echo "<SCRIPT> window.location.replace('job-provider-home.php')</SCRIPT>";
                 }
                 }
          
        else {
            
         echo '<script> alert("wrong password")</script>';
         echo "<SCRIPT> window.location.replace('provider-log-in.html')</SCRIPT>";
        }
        }
    }
       else { 
            
         echo '<script> alert("enter a correct username")</script>';
         echo "<SCRIPT> window.location.replace('provider-log-in.html')</SCRIPT>";   
        }       
 }
        else {
        die("Error". mysqli_connect_error()); 
        }
        

?>