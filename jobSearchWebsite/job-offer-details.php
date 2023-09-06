<!DOCTYPE html>
<?php 
session_start();

if (!isset($_SESSION['seeker-id']) && !isset($_SESSION['provider-id']) ){
    header('Location:index.php');  
}

require './connection.php'; 
$idDetal = $_GET['id'];

$qurey1="SELECT * FROM joboffer WHERE id = $idDetal"; 
$result1 = mysqli_query($connect, $qurey1) ;

if (mysqli_num_rows($result1)> 0 ){
while ($row= mysqli_fetch_assoc($result1)){
    $idPro = $row['job_provider_id'];
    $idCat = $row['job_category_id'];
    $title = $row['title'];
    $time = $row['full_time'];
    $salary = $row['salary'];
    $location = $row['location'];
    $description = $row['description'];
    $requirements = $row['requirements'];
}}


$qurey2="SELECT * FROM jobprovider WHERE id = '$idPro' "; 
$result2 = mysqli_query($connect, $qurey2) ;

if (mysqli_num_rows($result2)> 0 ){
while ($row= mysqli_fetch_assoc($result2)){
    $ProName = $row['name'];
    $loc = $row['main_location'];
    $number = $row['phone_number'];
    $email = $row['email_address'];
}}

$qurey3="SELECT * FROM jobcategory WHERE id = '$idCat' "; 
$result3 = mysqli_query($connect, $qurey3) ;

if (mysqli_num_rows($result3)> 0 ){
while ($row= mysqli_fetch_assoc($result3)){
    $category = $row['category'];
}}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Offer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
  

    <style>        
        body{
        margin: 0;
        width:100%;
        padding:0;
        height:100%;
        }

        header{
        margin-top:0;
        }

        .header {
        overflow: hidden;
        background-color: #457B9D;
        padding: 0px;
        top:0;
        margin-top:0;
        position:absolute;
        left:0;
        right:0;
        width:100%;
        clear: both;
        }

        .header img {
        float: left;
        }

        .header-right {
        float: right;
        }

        .back{
        font-family: Arial, Helvetica, sans-serif;
        float: left;
        color: #1D3557;
        text-align: center;
        padding: 25px;
        text-decoration: none;
        font-size: 25px; 
        line-height: 25px;
        border-radius: 4px;
        }

        .back:hover {
        text-decoration: underline;
        color: #1D3557;
        }

        footer{
        margin-bottom:0;
        
        }

        .footer{
        margin-bottom:0;
        overflow: hidden;
        background-color: #457B9D;
        text-align: center;
        padding:0px;

        position:absolute;
        left:0;
        right:0;
        width:100%;
        clear: both;

        }

        .fa-twitter {
        background: #55ACEE;
        }

        .fa-facebook {
        background: #3B5998;
        }

        .fa-instagram {
        background: #E1306C;
        }

        .SocialMedia{
        width: 50px;
        display:inline;
        }

        .footer .SocialMedia > a {
        font-size:24px;
        width:40px;
        height:40px;
        line-height:40px;
        display:inline-block;
        text-align:center;
        border-radius:50%;
        border:1px solid #ccc;
        margin:15px 10px;
        color:inherit;
        opacity:0.75;
        }

        .copyright{
        color:#F1FAEE;
        opacity:0.75;
        font-size: 15px;
        }


        .contant{
        margin-top:8%;
        margin-bottom:4%; 
        }
    </style>
</head>
<body>
    <div class="header">
        <header>

            <img src="Logo.PNG" alt="Logo" class="logo" width="10%" height="100%">

            <div class="header-right">
                <a class="back" href="Sign-out.php">Log-out</a>
            </div>

        </header>
    </div>
    
    <section style="margin-top: 90px;">

        <div>
            <h3 class="title">Job Offer</h3>
            <div class="mid-line"></div>
        </div>

        <div class="main-section">
            <h4>Job Information</h4>
            
            <div class="d-flex">
                <div>
                    <div>
                        <span>Category: </span> <?php echo $category;?>
                    </div>
                    <div>
                        <span>Title: </span> <?php echo $title ;?>
                    </div>
                    <div>
                        <span>Job Type: </span> <?php echo $time ;?>
                    </div>
                </div>
    
                <div>
                    <div>
                        <span>Salary: </span> <?php echo $salary ;?>
                    </div>
                    <div>
                        <span>Location: </span> <?php echo $location ;?>
                    </div>
                    <div>
                        <span>Description: </span> <?php echo $description ;?>
                    </div>
                </div>
            </div>

            <div class="requirements">
                <div>Job Requirements</div>
                <?php echo $requirements ;?> 
            </div>

            <div>
                 <?php 
                 if($_SESSION['role'] == 'job provider'){
                echo "<form method='GET' action='Edit_job.php'> <button type='submit' class='btn' name='EditButton' value=$_GET[id]>Edit This Job</button></form>";}  
                ?>
                <?php if($_SESSION['role'] == 'job seeker'){
                   $ID = $_SESSION['seeker-id'];
                   $qurey4 = "SELECT job_offer_id FROM  jobapplication where job_seeker_id = '$ID'"; 
                   $result4 = mysqli_query($connect, $qurey4) ;
                   
                   $flag = true;
                   if (mysqli_num_rows($result4)> 0 ){
                   while ($row= mysqli_fetch_assoc($result4)){
                    if ($row['job_offer_id'] == $_GET['id'])   
                        $flag = false;
                   }}
                   if ($flag)
                    echo "<form method='GET' action='jobSeekerHome-ApplyButton.php'><button type='submit' class='btn' name='ApplayButton' value=$_GET[id]>Apply For This Job</button></form>";}
            ?>
               
            </div>

        </div>
        
 <?php if(isset($_SESSION['seeker-id'])){ 
     echo"   <div class='main-section'>
            <h4>Job Provider Information</h4>
            
            <div class='d-flex'>
                <div>
                    <div>
                        <span>Name: </span>  $ProName 
                    </div>
                    <div>
                        <span>Location: </span> $loc
                    </div>
                    <div>
                        <span>Phone Number: </span>  $number
                    </div>
                </div>
    
                <div>
                    <div>
                        <span>Email: </span>  $email 
                    </div>
                    
                </div>
            </div>

            <br>

           

        </div>";   } ?>     
    </section>

    <div class="footer">
        <footer>

             <div class="SocialMedia">
                  <a href="#" class="fa fa-twitter"></a>
                  <a href="#" class="fa fa-facebook"></a>
                  <a href="#" class="fa fa-instagram"></a>
             </div>  

            <div class="copyright"> 
            <p> ©️ 2020 Copyright: JOB.com </p>
            </div>

       </footer>
    </div>
</body>
</html>