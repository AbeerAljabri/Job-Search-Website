<!DOCTYPE html>

<?php 
ini_set('display_errors',1);

require './connection.php'; 
session_start();
//check session
if (!isset($_SESSION['provider-id']) ){
    header('Location:index.php');
  
   
}

$ID = $_SESSION['provider-id'];
$role = $_SESSION['role'];
$qurey="SELECT * FROM jobprovider WHERE id = '$ID' ";
$result = mysqli_query($connect, $qurey) ;
if (mysqli_num_rows($result)> 0 ){
        while ($row= mysqli_fetch_assoc($result)){
            $name = $row['name'];
            $location = $row['main_location'];
            $phone = $row['phone_number'];
            $emailA = $row['email_address'];
            $Uname = $row['username'];
            
        }
}

//for app table
$qurey2="SELECT * FROM joboffer WHERE job_provider_id = '$ID' "; //offer id
$result2 = mysqli_query($connect, $qurey2) ;

if (mysqli_num_rows($result2)> 0 ){
        while ($row2= mysqli_fetch_assoc($result2)){
            $idOffer[] = $row2['id'];
            $idOff = $row2['id'];
            $tit[] = $row2['title'];//title name
            
            $qurey3="SELECT * FROM  jobapplication where job_offer_id  = '$idOff'"; 
            $result3 = mysqli_query($connect, $qurey3) ;
 

            if (mysqli_num_rows($result3)> 0 ){
 
                 while ($row= mysqli_fetch_assoc($result3)){
                         $idApp[] = $row['id'];//array for app ids
                         $idSee[] = $row['job_seeker_id'];//array for seeker ids
                         $idS = $row['job_seeker_id'];//id for seeker name
                         $idAppS = $row['application_status_id'];//id for status
                         $idOffer1[] = $row['job_offer_id'];
            
                        $qurey = "SELECT * FROM  jobseeker  WHERE id = '$idS'" ;
                        $result = mysqli_query($connect, $qurey) ;
                        if (mysqli_num_rows($result)> 0 ){
                            while ($row= mysqli_fetch_assoc($result)){
                                 $SeekerFname[] = $row['first_name'];//seeker name
                                 $SeekerLname[] = $row['last_name'];
                                        }
                           }
                           
                        $qurey = "SELECT * FROM   applicationstatus  WHERE id = '$idAppS'" ;
                        $result = mysqli_query($connect, $qurey) ;
                        if (mysqli_num_rows($result)> 0 ){
                            while ($row= mysqli_fetch_assoc($result)){
                                 $statuses[] = $row['status']; //status
                                        }
                           } 
          
       }
  }
        }
}

  
?>
<head>
    <title> provider page </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="provider.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function(){

 // Delete 
 $('.delete').click(function(){
   var el = this;
  
   // Delete id
   var deleteid = $(this).data('id');
 
   var confirmalert = confirm("Are you sure?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'JobProvider-OfferdJob-DeleteButton.php',
        type: 'POST',
        data: { id:deleteid },
        success: function(response){

          if(response == 1){
	    // Remove row from HTML Table
	   $(el).closest('tr').css('background','tomato');
	   $(el).closest('tr').fadeOut(800,function(){
	      $(this).remove();
            
	    });
          }else{
	    alert('Error!');
          }

        }
      });
   }

 });

})     ;
</script>
<script>
    $(document).ready(function(){

 // Delete 
 $('.updateStatus').click(function(){
   var e2 = this;
   // Delete id
   var updateOfferId = $(this).data('id');
 var collection = document.getElementsByClassName("UpdateButton");
 for (let i = 0; i < collection.length; i++) {
    // global value;
     value1 = collection[i].value;
  if ( value1 !== "nothing" )
  { 
      break;
  
  }
}
      // AJAX Request
      $.ajax({
        url: 'updateStatusScript.php',
        type: 'GET',
        data: {  id1: updateOfferId,
                 status: value1 },
        success: function(response){

          if(response == 1){
	   $('#' + updateOfferId).html(value1);
           $(".UpdateButton").val('nothing');
         
          }else{
	    alert('Error!');
          }

        }
      });
 });
 });

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
}
      
.editbottun{
 text-decoration: none;
}

.editbottun:hover{
 color:#F1FAEE;
 text-decoration: none;
}

table {
border-collapse: collapse;
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
    <main>

        <h1>Welcome <?php echo $name; ?> </h1>
<h1 >Information:</h1>

<div class="information">
  <ul >
    <li>
      <div class="card_1">
        <h2 class="card-title">Personal Information</h2>
      </div>
      <div class="card-2"></div>
      <div class="card-info">
      <h2>Personal Information</h2>
       <p>Name: <?php echo $name;?> </p>
       <p>Main location: <?php echo $location;?> </p>
      </div>
    </li>
    <li>
      <div class="card_1">
        
        <h2 class="card-title">Contact information</h2>
      </div>
      <div class="card-2"></div>
      <div id="info2" class="card-info">
        <h2>Contact information</h2>
        <P>Phone number: <?php echo $phone;?></P>
        <P>Email address: <?php echo $emailA;?></P>
      </div>
    </li>
</ul>
</div>


<br> <br>
<h2 class="table-title"> Received Applications </h2>               

<table>
  <tr>
    <th class="f1">Job Title</th>
    <th class="f1">Applicants</th>
    <th class="f1">Status </th>
    <th class="f1">Update Status</th>
  </tr>
<?php 
  if  (isset($idOffer1)){
$len1 = count($idOffer1);
for ($i=0;$i<$len1;$i++){
$qurey6="SELECT title FROM joboffer WHERE id = '$idOffer1[$i]' ";
    $result6 = mysqli_query($connect, $qurey6) ;
    if (mysqli_num_rows($result6)> 0 ){
        while ($row6= mysqli_fetch_assoc($result6)){
           $JobTitle[] =  $row6['title'];
            
 }
    }
}
$len = count($idOffer1);
for ($i=0;$i<$len;$i++){
    $a =$idOffer1[$i] ;
    $a2 = $idSee[$i] ;
    $a3 = $idApp[$i] ;
    
  echo "<tr>
    <td> <a href='job-offer-details.php?id=$a' style='font-weight: bold;'>  $JobTitle[$i] </a>  </td>
    <td> <a href='applicant-information.php?id=$a2' style='font-weight: bold;'>  $SeekerFname[$i] $SeekerLname[$i]  </a> </td>
    <td >  <span class='status' id= $a3 > $statuses[$i]  </span></td>
       <td> 

    <form >       
    <select name='update' class='UpdateButton'>
    
            <option value='nothing'>...</option> 
            <option value='under consideration'> under consideration </option> 
            <option value='request for interview'>request for interview </option>
            <option value='declined'>declined </option>
            <option value='accepted'>accepted </option>

    </select>";
       
    echo " <button type='button' class='updateStatus' name='UpdateButton'  value='$a3'  data-id='$a3' ' >Update</button>
    </form>
  </td>
</tr>";}
  } ?>    
</table>




<br> 
<h2 class="table-title">Offered jobs</h2>  <a class="add" href="new_job.php"> Add New job offer </a> 

<table >

  <tr>
    <th class="f2">Job title</th>
  </tr>

<?php 
if  (isset($tit)){ 
$len2 = count($tit);
for ($i=0;$i<$len2;$i++){
    $a =$idOffer[$i] ;
    $id = $a;
  echo "<tr>
    <td> <a href='job-offer-details.php?id=$a'> $tit[$i] </a></td>
    
    <td> 
    <form action='Edit_job.php' method='GET'>          
    <button type='submit' name='EditButton' value=$a>Edit</button> 
    </form>
    </td>
    
    <td> 
     
     <button type='button' class='delete' data-id='$id'>Delete</button>
  </td>
  </tr>
<tr> ";}
}?>

</table>
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