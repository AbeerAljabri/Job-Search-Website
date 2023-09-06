<?php

//$connect= mysqli_connect("localhost" , "g3ksuit_g3ksuit1" , "zsOTog?3XbV1" , "job_db-2" ); 

       $connect= mysqli_connect("localhost" , "root" , "" , "job_db-2" );  
        $error = mysqli_connect_error();
       
        if ($error != null) {
            echo "<p> Could not connect to the database. $error</p>";
        }
        
        ?>