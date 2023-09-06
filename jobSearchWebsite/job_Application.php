<?php

ini_set('display_errors', 1);
require './connection.php';
//check session

$ID = $_SESSION['seeker-id'];

$qurey11 = "SELECT * FROM jobapplication WHERE job_seeker_id = '$ID' "; //offer id
$result11 = mysqli_query($connect, $qurey11);
if (mysqli_num_rows($result11) > 0) {
    while ($row11 = mysqli_fetch_assoc($result11)) {

        $job_offerID = $row11['job_offer_id'];
        $idAppState = $row11['application_status_id'];

        $qurey22 = "SELECT * FROM  joboffer where id  = '$job_offerID'";

        $result22 = mysqli_query($connect, $qurey22);
       
        if (mysqli_num_rows($result22) > 0) {

            while ($row22 = mysqli_fetch_assoc($result22)) {

                $title = $row22['title'];
                $job_provider_id = $row22['job_provider_id'];

                echo "<tr>
                    
                    <td id=''> <a href='job-offer-details.php?id=$job_offerID' style='font-weight: bold;'>$title</td>
                    <td id=''>";
                $qurey33 = "SELECT * FROM   jobprovider  WHERE id = ' $job_provider_id'";
                $result33 = mysqli_query($connect, $qurey33);
                if (mysqli_num_rows($result33) > 0) {
                    while ($row2 = mysqli_fetch_assoc($result33)) {
                        $jobProviderName = $row2['name'];
                    }
                } echo " $jobProviderName  </td>";

                echo "<td id=''> ";
                $qurey55 = "SELECT * FROM   applicationstatus  WHERE id = '$idAppState'";
                $result55 = mysqli_query($connect, $qurey55);
                if (mysqli_num_rows($result55) > 0) {
                    while ($row = mysqli_fetch_assoc($result55)) {
                        $statuses = $row['status']; //status
                    } echo "$statuses</td>
                     
                   
                      
                </tr>";
                }
            }
        }
    }
}
    ?>


