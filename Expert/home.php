<head>
<script src="js/browser.js"></script>
<script src="clickbtn.js"></script>
<script src='voicerecon.js'></script>
<link href=division.css rel="stylesheet" type="text/css"/>
</head>
<body onload="clickbtn()" onload="detectbrow()">
<?php
session_start();
$user=$_SESSION['user'];
?>

<?php include('header.php')?><hr>
<div class="wel">
<h4 align="right" style="font-size:20px">Welcome <span style='color:orange'><?php echo $user?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
</div><hr>
<br><br>
<div class="flex-wrapper">
  <div class="container">
      <a href="view.php" style="color:black"><div id="left"><br><br><br>
      <img src="requests.png" width='170'><br><b><p style="font-size:20px">View Service Requests</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        </div></a>
        
      <a href="Services.php" style="color:black"><div id="right"  ><br><br><br>
      <br><img src="myservices.png" width='160'><b><p style="font-size:20px">Services</b></p>
      </div></a>
      <div class="div.footer-section contact-form"></div>
    </div>
</div>


      <br><br><br><br>
    <div class="footer" style="background:white;color:black">
      &copy; GREIVANCE REDRESSAL &nbsp;&nbsp;
      
    </div>


</body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<button type="button" class="btn btn-outline-success" onclick="recon('contact')" id='speak'>Speak/Read</button>
    <textarea id="results" class="form-control" cols="80" rows="5" ></textarea>
</html>