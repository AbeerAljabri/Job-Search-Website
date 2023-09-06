<?php 
ini_set('display_errors',1);
require './connection.php'; 
session_start();
if (!isset($_SESSION['provider-id']) ){
    header('Location:index.php');
   
}

$toEdit = $_GET['EditButton'];
$qurey="SELECT * FROM joboffer WHERE id = '$toEdit' ";
$result = mysqli_query($connect, $qurey) ;
if (mysqli_num_rows($result)> 0 ){
        while ($row= mysqli_fetch_assoc($result)){
            $IDOFFER = $row['id'];
            $provider_name = $row['job_provider_id'];
            $category_id = $row['job_category_id'];
            $title = $row['title'];
            $time = $row['full_time'];
            $salary = $row['salary'];
            $location = $row['location'];
            $description = $row['description'];
            $requirements = $row['requirements'];
        }
}


$qurey1="SELECT * FROM jobcategory WHERE id = '$category_id' ";
$result1 = mysqli_query($connect, $qurey1) ;
if (mysqli_num_rows($result1)> 0 ){
        while ($row= mysqli_fetch_assoc($result1)){
            $category = $row['category'];
 }}
?>

<html>
  <head>
    <title>Edit job</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="provider.css">
    
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

form{
width: 50%;
margin:auto;
}
.contant{
margin-top:8%;
margin-bottom:4%; 
}
fieldset{
  border: 2px solid #A8DADC;
  border-radius: 5px;
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
<div class="contant">
       <form action="updateJobOfferInformation.php" method="POST">
       <fieldset>
        
          <label for="cate">Category:</label> <br>
          <input type="text" id="cate" name="cate" value="<?=$category?>"><br>
          <label for="title">Job title:</label> <br>
          <input type="text" id="title" name="title" value="<?=$title?>"><br>
            <label for="time">Time type:</label> <br>
          <select name="time" value="<?=$time?>">
            <option value="full-time"> full-time</option>
            <option value="part-time">part-time</option>

        </select>
        <br>
              <label for="sal">Salary:</label> <br>
          <input type="text" id="sal" name="sal" value="<?=$salary?>"><br>
        
            <label for="loc">Location:</label> <br>
          <input type="text" id="loc" name="loc" value="<?=$location?>"<br>
          
              <label for="des">Description:</label>  <br>
          <textarea name="description" rows="10" cols="64"><?=$description?></textarea> <br>
          
               <label for="req">Requirments:</label>  <br>
          <textarea name="requirements" rows="10" cols="64"><?=$requirements?></textarea>
          <br> <br>
          <button type="submit" name="toUp" value="<?=$IDOFFER?>" >Submit</button>
   </fieldset>
   </form>
 
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