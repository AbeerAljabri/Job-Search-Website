<!DOCTYPE html>
<?php 
require 'connection.php';
session_start();
//check session
ini_set('display_errors',1);

if (!isset($_SESSION['seeker-id']) ){
    header('Location:index.php');
}

$ID = $_SESSION['seeker-id'];
$role = $_SESSION['role'];


// display personal information
$qurey="SELECT * FROM jobseeker WHERE id = '$ID' ";
$result = mysqli_query($connect, $qurey) ;
echo mysqli_num_rows($result);
if (mysqli_num_rows($result)> 0 ){
        while($row= mysqli_fetch_assoc($result)){
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $age = $row['age'];
            $qualifications1 = $row['qualifications'];
            $work_experience1 = $row['work_experience'];
            $languages1 = $row['languages'];
            $phone_number1 = $row['phone_number'];
            $email_address1 = $row['email_address'];
           
        }
 }

?>
<html>

<head>
    <title>Job seeker home page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Job-seeker-home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>  

<script>

function showCustomer(str) {
  
   if (str == "0") {
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
   
    if (this.readyState == 4 && this.status == 200) {
    var job =  document.getElementById("job-offers");
   job.innerHTML = '';
 
    var myArr = JSON.parse(this.responseText);
    var i;
    var ItemRow = `<table id='job-offers'>
                   <tr>
                    <th id=''> Job Category</a></th>
                    <th id=''>Job Title</th>
                    <th id=''>Job provider</th>
                    <th id=''>salary</th>
                    <th id=''></th>
                    <th  id=''></th>
                </tr-->`

        document.getElementById("job-offers").innerHTML = ItemRow;
        
        
            for(i = 0; i < myArr.length; i++) {

            var job_offer_id = myArr[i].id;
            var job_category_id = myArr[i].job_category_id ;
            var title = myArr[i].title;
            var job_provider_id = myArr[i].job_provider_id;
            var salary = myArr[i].salary; 
            var row = `<tr><td id=''>  ${job_category_id} </td>
                       <td id=''> ${title} </td>
                       <td id=''> ${job_provider_id} </td>
                       <td id=''> ${salary} </td>
             <td id=''><a href='job-offer-details.php?id=${job_offer_id}' alt='details'>Details</a></td>
                <td id=''> <form action='jobSeekerHome-ApplyButton.php' method='GET'>
                        <button class='applay' id='myBtn-applay' type='submit' name='ApplayButton' value=${job_offer_id}>Applay</button>
                         </form></td></tr>`;
               document.getElementById("job-offers").innerHTML += row;

       }
  }

  };
  xhttp.open("GET", "available-job-offer.php?q="+str);
  xhttp.send();
}
</script>
    <style>
       body{
  margin: 0;
  width:100%;
  padding:0;
  height:100%;
}


.header {
  overflow: hidden;
  background-color: #457B9D;
  padding: 0px;
  top:0;
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

  overflow: hidden;
  background-color: #457B9D;
  text-align: center;
  padding:0px;
  margin-bottom:0;
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
       
    </style>
   
</head>


<body>

    <body>
        <div class="header">
        <header>
          
          <img src="Logo.PNG" alt="Logo" class="logo" width="10%" height="100%">
          
          <div class="header-right">
            <a class="back" href="Sign-out.php" >Log-out</a>
       
          </div>
          
        </header>
        </div>

    <main>
        <h1>Welcome <?php echo $first_name ." ".$last_name;?> </h1>
        <h1>Information:</h1>
        
        <div class="information">
            <ul >
              <li>
                <div class="card_1">
                  <h2 class="card-title">Personal Information</h2>
                </div>
                <div class="card-2"></div>
                <div class="card-info">
                <h2>Personal Information</h2>
                 <p>First name: <?php echo $first_name?></p>
                 <P>Last name: <?php echo $last_name ?> </P>
                 <P>Age: <?php echo $age ?></P>
                </div>
              </li>
              <li>
                <div class="card_1">
                  
                  <h2 class="card-title">Skills</h2>
                </div>
                <div class="card-2"></div>
                <div id="info2" class="card-info">
                  <h2>Skills</h2>
                  <P>Qualifications:  <?php echo $qualifications1 ?></P>
                  <P>Work experience:  <?php echo $work_experience1 ?></P>
                  <P>Languages:  <?php echo $languages1 ?> </P>
                </div>
              </li>
              <li>
                <div class="card_1">
                 
                  <h2 class="card-title">Contact Information</h2>
                </div>
                <div class="card-2"></div>
                <div class="card-info">
                  <h2>Contact Information</h2>
                  <P>Phone number:  <?php echo $phone_number1 ?> </P>
                  <P>Email address:  <?php echo $email_address1 ?></P>
                </div>
              </li>
            </ul>
          </div>


        <div id="Job-applications">
            <table id="Job-applications-table">
                <caption>Job Applications</caption>
                <tr>
                    <th id="">Job title</th>
                    <th id="">Job provider</th>
                    <th id="">Job status</th>
                    <?php

                    {
                        include 'job_Application.php';
                    }
                    ?>
                </tr>
               

            </table>
        </div>
        <div id="job-offers1">
          <div class="a">
            <p></p>
           
               
           <p id="title">Available Job Offers</p>
            <form action="AvailableJobOffers.php"  method="GET"  style=" margin-right: 0px;">
           <p class="sort" style="float: right; ">Search by Category
           <p id="a"> </p>
       
        <?php    
        $query1 = "SELECT * FROM jobcategory";  
        $result1 = mysqli_query($connect, $query1);
        ?>
                <select id="JobCategory" name="obsCategory" onchange="showCustomer(this.value)">
                
                 <option value="0">...</option>
                   <?php
                    while($row = mysqli_fetch_array($result1))
                    {
                    ?>
                    <option name='category' value="<?php echo $row['id']; ?>"> <?php echo $row['category']; ?> </option>
                  
                    <?php
                    }
                    ?>
                </select>
               
               <!--button  type="submit" value="<?php echo $row['id']; ?>" >Search</button-->
                
            </form>
            </p>
    </div>

            <table id="job-offers">

                
                <tr>
                    <th id=""> Job Category</a></th>
                    <th id="">Job Title</th>
                    <th id="">Job provider</th>
                    <th id="">salary</th>
                    <th id=""></th>
                    <th  id=""></th>
                </tr-->
              
               
   
                <?php 
                
$ID = $_SESSION['seeker-id'];
 if (isset ( $_GET['JobsCategory']))
 {
 $categoryID = $_GET['JobsCategory'];
 if ( $categoryID == 0 ) 
   {
    unset($_GET['JobsCategory']);
    echo "<SCRIPT>window.location.replace(job-seeker-home.php)</SCRIPT>";
    }
 }


 //Fine Available Job Offers not applied 
$qurey4 = "SELECT job_offer_id FROM  jobapplication where job_seeker_id = '$ID'"; 
$result4 = mysqli_query($connect, $qurey4) ;
$d='';
 while ($row4= mysqli_fetch_assoc($result4))
 {
   $d .="'";
   $d .= $row4['job_offer_id'];
   $d .="'";
   $d .= ",";
 }
 $d = rtrim($d, ",");

 // fill Available Job Offers table
$CountAppliedJobOffer = mysqli_num_rows($result4);
 // if job seeker does not apply any job
if ($CountAppliedJobOffer == 0)
{
 if (isset ( $_GET['JobsCategory'])){
 $qurey="SELECT  * from joboffer WHERE job_category_id ='$categoryID'";
  }
  else {
  $qurey = "SELECT * FROM  joboffer ";}
 }
 //if job seeker apply job
else {
   if (isset ( $_GET['JobsCategory']))
    {
     $qurey="SELECT * FROM joboffer WHERE job_category_id ='$categoryID' AND id NOT IN ($d) ";                    
    }
    else {
     $qurey = "SELECT * FROM  joboffer where id NOT IN ($d)";}
}
$result = mysqli_query($connect, $qurey);
$resultNumber = mysqli_num_rows($result);
if (mysqli_num_rows($result)> 0 ){

        while ($row= mysqli_fetch_assoc($result)){
            $job_offer_id = $row['id'];
            $job_category_id = $row['job_category_id'];
            $title = $row['title'];
            $job_provider_id = $row['job_provider_id'];
            $salary = $row['salary'] ; 
            
                echo "<tr>
                    <td id=''>";
                     $qurey1 = "SELECT * FROM  jobcategory  WHERE id = '$job_category_id'" ;
                     $result1 = mysqli_query($connect, $qurey1) ;
                     if (mysqli_num_rows($result1)> 0 ){
                     while ($row1= mysqli_fetch_assoc($result1)){
                     $catogery_name  = $row1['category'];    
                                        }
                           }
                           echo "$catogery_name </td>
                    <td id=''>$title</td>
                    <td id=''>"; 
                     $qurey2 = "SELECT * FROM   jobprovider  WHERE id = ' $job_provider_id'" ;
                     $result2 = mysqli_query($connect, $qurey2) ;
                     if (mysqli_num_rows($result2)> 0 ){
                     while ($row2= mysqli_fetch_assoc($result2)){
                     $jobProviderName  = $row2['name'];    
                                        }
                           } echo " $jobProviderName  </td>
                    <td id=''> $salary</td>
                    <td id=''><a href='job-offer-details.php?id=$job_offer_id' alt='details'>Details</a></td>
                     
                    <td id=''> <form action='jobSeekerHome-ApplyButton.php' method='GET'>
                        <button class='applay' id='myBtn-applay' type='submit' name='ApplayButton' value=$job_offer_id>Applay</button>
                         </form></td>
                      
                </tr>";
       }
  }
 
                ?>
     
            </table>
      </div>
       
    </main>
    
    <div class="footer">
        <footer>
        
        <div class="SocialMedia">
           <a href="#" class="fa fa-twitter"></a>
           <a href="#" class="fa fa-facebook"></a>
           <a href="#" class="fa fa-instagram"></a>
        </div>  
        
            <div class="copyright"> 
            <p> © 2020 Copyright: JOB.com </p>
            </div>
        
        </footer>
        </div>
        
</body>

</html>