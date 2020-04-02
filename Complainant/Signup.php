<!DOCTYPE html>
<html lang="en">
<head>
<link href="signin.css" rel="stylesheet" type="text/css"/>
<script src="js/browser.js"></script>
<script src='js/contact.js'></script>
<script src="clickbtn.js"></script>
<script src='voicerecon.js'></script>
</head>
<body onload="clickbtn()" onload="detectbrow()"style="background:#00e6e6">

        <center><div class="signup" style="background-color:#b3ffff">

<form action="Signup.php" method="POST">
  <p align=center><font size="5"><b>GREIVANCE REDRESSAL</b></font></p>
  <h2><b><font size="4">Create an account</b></h2>
  &nbsp;First Name: &nbsp;<input type="text"class="form-control" id='first' name="first" placeholder="first"><br><br>
  &nbsp;Last Name: &nbsp;<input type="text" class="form-control" id='last' name="last" placeholder="last"><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;Gender:&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="form-control" name="gender" value="Male" placeholder="Male">Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" class="form-control" value="Female"placeholder="Name">Female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Other">Other&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
  Username:&nbsp;&nbsp;<input type="text" class="form-control" id='username' name="username" placeholder="Name"><br><br>
  Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" id="email" name="email"placeholder="email"><br><br>
  Phone: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" class="form-control" id="phone" name="phone" placeholder="phone"><br><br>
  Password:&nbsp;&nbsp; <input type="Password" class="form-control" id="pass" name="pass" placeholder="pass"><br><br>
  <input type="submit" class="btn btn-outline-dark" id='submit' name='submit' onclick="btnclicked()">
  <input type="reset" name="reset" class="btn btn-outline-dark" id='reset' value='reset' placeholder='reset' onclick="btnclicked()"><br><br><br>
Have an account?&nbsp;<a style="color:black;text-decoration:none" href="Login.php"><b><u>Log In</u></b></a>
<?php
if(isset($_POST['submit'])){
  error_reporting(0);
$FName=$_POST["first"];
$LName=$_POST["last"];
$Gender=$_POST["gender"];
$username=$_POST["username"];
$Email=$_POST["email"];
$Phone=$_POST["phone"];
$Password=$_POST["pass"];
$con=Mysqli_connect('127.0.0.1',"root","","greivance redressal");
$result1=mysqli_query($con,"SELECT * FROM users where Username='$username'");
$row=mysqli_fetch_array($result1);
if($row['Username']==$username){
  
  echo "<br><b>Username already taken<b>";
}
else{
  error_reporting(0);
  $result1=mysqli_query($con,"SELECT * FROM users where Email='$Email'");
  $row=mysqli_fetch_array($result1);
  if($row['Email']==$Email){
    error_reporting(0);
    echo "<br><b>This email is already registered<b>";
  }
  else{
    error_reporting(0);
$result2=mysqli_query($con,"Insert into users values('$FName','$LName','$Gender','$username','$Email',$Phone,'$Password')")
   or die("Failed to query database".mysqli_error($con));
echo "<br><b>Successfully registered<b>";
header('Location: login.php');
  }
}
}
error_reporting(0);
mysqli_close($con);
?>
    </body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <button type="button" class="btn btn-outline-success" onclick="recon('contact')" id='speak'>Speak/Read</button>
    
    <textarea id="results" class="form-control" cols="80" rows="5" ></textarea>
    </html>