<!DOCTYPE html>
<html lang="en">
<head>
<script src="js/browser.js"></script>
<script src="js/contact.js"></script>
<script src="clickbtn.js"></script>
<script src='voicerecon.js'></script>
<link href=division.css rel="stylesheet" type="text/css"/>
<link href=tablestyle.css rel="stylesheet" type="text/css"/>
</head>
<body onload="clickbtn()" onload="detectbrow()">
<?php
session_start();
$user=$_SESSION['user'];
?>
<?php include('header.php')?><hr>
<center><h3>Services:</h3>
<?php
$con=Mysqli_connect('127.0.0.1',"root","","greivance redressal");
$result=mysqli_query($con,"Select * from expertservices where ExpertName='$user'") or die("Could not read table".mysqli_error($con));

if($result){
    echo "<table class='content-table'><thead style='background-color:black'>
    <tr style='background-color:orange'><th> &nbsp;Complaint Number &nbsp;</th>
    <th> &nbsp;Username&nbsp;</th>
    <th> &nbsp;Email&nbsp;</th>
    <th> &nbsp;Phone&nbsp;</th>
    <th> &nbsp;Complaint_description&nbsp;</th>
    <th> &nbsp;Address&nbsp;</th>
    <th>&nbsp;Images&nbsp;</th>
    <th> &nbsp;Date&nbsp;</th>
    <th> &nbsp;Salary&nbsp;</th>
    <th> &nbsp;Status&nbsp;</th></tr></thead>";
    
    while($row=mysqli_fetch_array($result)){
        echo "<tbody><tr style='border-bottom: 1px solid orange;'>";
      echo "<td>".$row['Complaint_no']."</td>";
      $cmno=$row['Complaint_no'];
      echo "<td>".$row['Username']."</td>";
      echo "<td>".$row['Email']."</td>";
      echo "<td>".$row['Phone']."</td>";
      echo "<td width='200' height='100'>".$row['Complaint_description']."</td>";
      echo "<td width='100'>".$row['Address']."</td>";
      echo "<td>"."<a href='\greivance\a\show.php?complaint=$cmno' style='color:black' id='show$cmno' onclick='btnclicked()'>Click here to view image</a>"."</td>";
      echo "<td>".$row['Date']."</td>";
      echo "<td>".$row['Salary']."</td>";
      echo "<td>".$row['Status']."</td>";
      echo "</tr></tbody>";

    }
}
echo "</table>";?>
</body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<button type="button" class="btn btn btn-outline-success my-2 my-sm-0" onclick="recon('contact')" id='speak'>Speak/Read</button><br>
<textarea id="results" class="form-control" cols="80" rows="5" ></textarea>
</html>