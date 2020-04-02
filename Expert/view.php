<!DOCTYPE html>
<html lang="en">
<head>
<script src="js/browser.js"></script>
<script src="clickbtn.js"></script>
<script src='voicerecon.js'></script>
<link href=division.css rel="stylesheet" type="text/css"/>
<link href=tablestyle.css rel="stylesheet" type="text/css"/>
<?php
session_start();
$user=$_SESSION['user'];
?>

<body onload="clickbtn()" onload="detectbrow()">
<?php include('header.php')?><hr>
<center><h3>Service Requests:</h3>
<?php
$con=Mysqli_connect('127.0.0.1',"root","","greivance redressal");
$result=mysqli_query($con,"Select * from expertservice where ExpertName='$user'") or die("Could not read table");
$arr=array();
if($result){
    echo "<table class='content-table'><thead style='background-color:black'>
    <tr style='background-color:orange'><th> &nbsp;Complaint Number &nbsp;</th>
    <th> &nbsp;Username&nbsp;</th>
    <th> &nbsp;Email&nbsp;</th>
    <th> &nbsp;Phone&nbsp;</th>
    <th> &nbsp;Complaint_description&nbsp;</th>
    <th> &nbsp;Address&nbsp;</th>
    <th> &nbsp;Date&nbsp;</th></tr></thead>";
    
    while($row=mysqli_fetch_array($result)){
        echo "<tbody><tr style='border-bottom: 1px solid orange;'>";
      echo "<td>".$row['Complaint_no']."</td>";
      array_push($arr,$row['Complaint_no']);
      echo "<td>".$row['Username']."</td>";
      echo "<td>".$row['Email']."</td>";
      echo "<td>".$row['Phone']."</td>";
      echo "<td width='200' height='100'>".$row['Complaint_description']."</td>";
      echo "<td width='100'>".$row['Address']."</td>";
      echo "<td>".$row['Date']."</td>";
      echo "</tr></tbody>";

    }
}
echo "</table>";?>
<?php if(!empty($arr)){?>
<h3>Select the Complaint Number You want to accept or reject:</h3>
<form action="#" method="POST">
    <select name="accorrej" id="Booking" style='border:solid;
    text-align: center;
    width:190px;
    height:30px;
    font-size:15px;
    border-radius: 15px;'>

        <?php
        foreach($arr as $item){?>
          <option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>
          <?php
          }
          ?>

        
        </select>&nbsp;&nbsp;
        <input type='submit' name='submit1' value='Accept' id='accept' onclick="btnclicked()" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type='submit' name='submit2' value='Reject' id='reject' onclick="btnclicked()">


<?php

error_reporting(0);
if($_POST['submit1']){
    error_reporting(0);
    $select=$_POST['accorrej'];
    $con=Mysqli_connect('127.0.0.1',"root","","greivance redressal");
    $result1=mysqli_query($con,"Select * from expertservice where ExpertName='$user'and Complaint_no=$select") or die("Could not read table");
    $row1=mysqli_fetch_array($result1);
    $Complaint_no=$select;
    $Username=$row1['Username'];
    $Email=$row1['Email'];
    $Phone=$row1['Phone'];
    $Des=$row1['Complaint_description'];
    $Address=$row1['Address'];
    $Date=$row1['Date'];
    $result2=mysqli_query($con,"INSERT INTO expertservices(Complaint_no,ExpertName,Username,Email,Phone,Complaint_description,Address,Date) VALUES ($select,'$user','$Username','$Email','$Phone','$Des','$Address','$Date') ") or die("Could not read table");
    $result3=mysqli_query($con,"Delete from expertservice where Complaint_no=$select");
    if($result2 and $result3){
        echo "<br>Successfully Accepted";
    }
    else{
        echo "<br>Couldn't not accept";
    }
}
else if($_POST['submit2']){
    $con=Mysqli_connect('127.0.0.1',"root","","greivance redressal");
    $result3=mysqli_query($con,"Delete from expertservice where Complaint_no=$select");
    if($result3){
        echo "<br>Successfully Rejected";
}
}
}
?>


</body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<button type="button" class="btn btn-outline-success" onclick="recon('contact')" id='speak'>Speak/Read</button><br>
    <textarea id="results" class="form-control" cols="80" rows="5" ></textarea>
</html>