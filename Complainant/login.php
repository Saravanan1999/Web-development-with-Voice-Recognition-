<!DOCTYPE html>
<html lang="en">
<head>
<script src="js/browser.js"></script>
<script src='js/contact.js'></script>
<script src="clickbtn.js"></script>
<script src='voicerecon.js'></script>
<link href=homestyle.css rel="stylesheet" type="text/css"/>
</head>
<body onload="clickbtn()" onload="detectbrow()"style="background:#00e6e6">
<link href=signin.css rel="stylesheet" type="text/css"/>
<div class="signin">
  <form action="login.php" method="Post">
    <p align=center><font size="4"><b>GREIVANCE REDRESSAL</b></font></p>
    <h2><font size="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Log In</h2>
    <center><b>Username</b><br><input type="text" class="form-control" id='username' name="username" ><br>
    <br><b>Password</b><br><input type="password" id="password" name="pass" ><br>
  <br>  <input type="submit" name="submit" class="btn btn-outline-dark" id='submit' value="Log In" placeholder="log" onclick="btnclicked()"><br></center>
    <br>
    

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Don't have account?<a href="Signup.php" style="text-decoration:none;color:black">&nbsp;<b><u>Sign Up</u></b></a>
</div>
  </form>
</div>
</center>
<?php
if(isset($_POST['submit'])){
   error_reporting(0);
   $user=$_POST["username"];
   session_start();
   $_SESSION['user']=$user;
   $pass=$_POST["pass"];
   $con=Mysqli_connect('127.0.0.1',"root","","greivance redressal");
   $result=mysqli_query($con,"SELECT * FROM users where Username='$user'")
   or die("Failed to query database".mysqli_error($con));
   $row=mysqli_fetch_array($result);
   if($row['Password']==$pass){
    header('Location: home.php');
   }
   else{
     echo "Wrong username or password";
   }
  }

?>
 
    
    </body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <button type="button" class="btn btn-outline-success" onclick="recon('contact')" id='speak'>Speak/Read</button>
    <textarea id="results" class="form-control" cols="80" rows="5" ></textarea>
</html>