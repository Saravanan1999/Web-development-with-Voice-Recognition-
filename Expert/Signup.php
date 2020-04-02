<!DOCTYPE html>
<html lang="en">
<head>
<script src="js/browser.js"></script>
<script src="clickbtn.js"></script>
<script src='voicerecon.js'></script>
<link href=signin.css rel="stylesheet" type="text/css"/>
</head>
<body onload="clickbtn()" onload="detectbrow()" style="background:#ff9900">
<center><div class="signup" style="background-color:#ffd699">

<form action="Signup.php" method="POST">
  <p align=center><font size="5"><b>GREIVANCE REDRESSAL</b></font></p>
  <h2><b><font size="4">Create an account</b></h2>
  &nbsp;First Name: &nbsp;<input type="text" name="fname" id='first'><br><br>
  &nbsp;Last Name: &nbsp;<input type="text" name="lname" id='last'><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;Gender:&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Male" id='male' onclick="btnclicked()">Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Female" id='female' onclick="btnclicked()">Female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Other" id='other' onclick="btnclicked()">Other&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
  Username:&nbsp;&nbsp;<input type="text" name="username" id='username'><br><br>
  Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="email" id='email'><br><br>
  Phone: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="phno" id='phone'><br><br>
  Password:&nbsp;&nbsp; <input type="Password" name="password" id='pass'><br><br>
  <input type="Submit" name="submit" id='submit'onclick="btnclicked()">
  <input type="reset" name="reset" id='reset' onclick="btnclicked()"><br><br><br>
Have an account?&nbsp;<a style="color:black;text-decoration:none" href="Login.php"><b><u>Log In</u></b></a>
<?php
if(isset($_POST['submit'])){
  error_reporting(0);
$FName=$_POST["fname"];
$LName=$_POST["lname"];
$Gender=$_POST["gender"];
$username=$_POST["username"];
$Email=$_POST["email"];
$Phone=$_POST["phno"];
$Password=$_POST["password"];
$con=Mysqli_connect('127.0.0.1',"root","","greivance redressal");
$result1=mysqli_query($con,"SELECT * FROM expert where Username='$username'");
$row=mysqli_fetch_array($result1);
if($row['Username']==$username){
  
  echo "<br><b>Username already taken<b>";
}
else{
  error_reporting(0);
  $result1=mysqli_query($con,"SELECT * FROM expert where Email='$Email'");
  $row=mysqli_fetch_array($result1);
  if($row['Email']==$Email){
    error_reporting(0);
    echo "<br><b>This email is already registered<b>";
  }
  else{
    error_reporting(0);
$result2=mysqli_query($con,"Insert into expert values('$FName','$LName','$Gender','$username','$Email',$Phone,'$Password')")
   or die("Failed to query database".mysqli_error($con));
echo "<br><b>Successfully registered<b>";
header('Location: login.php');
  }
}
}
error_reporting(0);
mysqli_close($con);
?>
 
</body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <button type="button" class="btn btn btn-outline-success my-2 my-sm-0" onclick="recon('home')" id='speak'>Speak/Read</button>
    <textarea id="results" class="form-control" cols="80" rows="5" ></textarea>
    </html>