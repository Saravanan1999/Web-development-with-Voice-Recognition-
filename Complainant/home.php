<!DOCTYPE html>
<html lang="en">
<head>
<script src="js/browser.js"></script>
<script src="clickbtn.js"></script>
<script src='voicerecon.js'></script>
<link href=division.css rel="stylesheet" type="text/css"/>
</head>

<?php
session_start();
$user=$_SESSION['user'];
?>
<body onload="clickbtn()" onload="detectbrow()">
<?php include('header.php')?><hr>
<div class="wel">
<h4 align="right" style="font-size:20px">Welcome <span style='color:#00ffff'><?php echo $user?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
</div><hr>
<br><br>
<div class="flex-wrapper">
  <div class="container">
      <a href="complaint.php" style="color:black"><div id="left"><br><br><br>
      <img src="complaint.png" width='170'><br><b><p style="font-size:20px">Write a complaint</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        </div></a>
        
      <a href="mycomplaints.php" style="color:black"><div id="right"  ><br><br><br>
      <br><img src="mycomplaints.png" width='160'><b><p style="font-size:20px">Your complaints</b></p>
      </div></a>
      
      <div class="div.footer-section contact-form"></div>
    </div>
</div>


      <br><br><br><br>
    <div class="footer" style="background:white;color:black">
      &copy; GREIVANCE REDRESSAL &nbsp;&nbsp;<br> Welcome to VIT
      
    </div>
   </body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <button type="button" class="btn btn btn-outline-success my-2 my-sm-0" onclick="recon('home')" id='speak'>Speak/Read</button>
    <textarea id="results" class="form-control" cols="80" rows="5" ></textarea>
</html>