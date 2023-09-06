<!DOCTYPE html>

<?php 
session_start();
require 'connection.php';

if (!isset($_SESSION['provider-id']) ){
    header('Location:index.php');

   
}

ini_set('display_errors',1);
$ID = $_GET['id'];
$qurey="SELECT * FROM jobseeker WHERE id = '$ID' ";
$result = mysqli_query($connect, $qurey) ;
if (mysqli_num_rows($result)> 0 ){
        while ($row= mysqli_fetch_assoc($result)){
            $fname = $row['first_name'];
            $lname = $row['last_name'];
            $age2 = $row['age'];
            $qualif = $row['qualifications'];
            $WE = $row['work_experience'];
            $lans = $row['languages'];
            $Alo = $row['phone_number'];
            $Em = $row['email_address'];
        }
}
 
?>

<html>

<head>
    <title>Appliant information page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Job-seeker-home.css">
    <script src=""></script>
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
            <a class="back" href="Sign-out.php">Log-out</a>
          </div>
          
        </header>
        </div>

    <main>
       
        <h1>Applicant's information</h1>
        <div class="information">
         
            <ul >
              <li>
                <div class="card_1">
                  <h2 class="card-title">Personal Information</h2>
                </div>
                <div class="card-2"></div>
                <div class="card-info">
                <h2>Personal Information</h2>
                 <p>First name: <?php echo $fname;?>  </p>
                 <P>Last name: <?php echo $lname;?> </P>
                 <P>Age: 26</P>
                </div>
              </li>
              <li>
                <div class="card_1">
                  
                  <h2 class="card-title">Skills</h2>
                </div>
                <div class="card-2"></div>
                <div id="info2" class="card-info">
                  <h2>Skills</h2>
                  <P>Qualifications: <?php echo $qualif;?></P>
                  <P>Work experience: <?php echo $WE;?></P>
                  <P>Languages: <?php echo $lans;?> </P>
                </div>
              </li>
              <li>
                <div class="card_1">
                 
                  <h2 class="card-title">Contact Information</h2>
                </div>
                <div class="card-2"></div>
                <div class="card-info">
                  <h2>Contact Information</h2>
                  <P>Phone number: <?php echo $Alo;?> </P>
                  <P>Email adress: <?php echo $Em;?></P>
                </div>
              </li>
            </ul>
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