<!DOCTYPE html>
<html lang="en">
<head>
<script src="js/browser.js"></script>
<script src="clickbtn.js"></script>
<script src='voicerecon.js'></script>
<script src='js/contact.js'></script>
<?php include('header.php')?>
<link href=homestyle.css rel="stylesheet" type="text/css"/>
<link href=tablestyle.css rel="stylesheet" type="text/css"/>

</head>
<body onload="clickbtn()" onload="detectbrow()">
<hr><center><style>
a:hover{
    color:blue;
}
</style>
<?php 
session_start();
$arr2=array();
$arr=array();
$user=$_SESSION['user'];
$con=Mysqli_connect('127.0.0.1',"root","","greivance redressal");
$result6=mysqli_query($con,"Select * from rating ") or die("Could not read table");
    while($row7=mysqli_fetch_assoc($result6)){
        array_push($arr2,$row7['Complaint_no']);
    }
    $result8=mysqli_query($con,"Select * from expertservices") or die("Could not read table".mysqli_error($con));
    while($row8=mysqli_fetch_assoc($result8)){
if($row8['Status']=='Completed'){
        array_push($arr,$row8['Complaint_no']);

    }
}
$result10=mysqli_query($con,"Select * from complaint where Username='$user'") or die('Couldnt connect to table');
if($result10){
    echo "<table class='content-table'><thead>
    <tr><th> &nbsp;Complaint_no &nbsp;</th>
    <th> &nbsp;Complaint Description&nbsp;</th>
    <th> &nbsp;Address&nbsp;</th>
    <th> &nbsp;Image&nbsp;</th>
    <th>&nbsp;Expert Name&nbsp</th>
    <th>&nbsp;Expert Phone Number&nbsp;</th>
    <th>&nbsp;Expert Email&nbsp;</th>
    <th>&nbsp;Status&nbsp;</th></tr></thead>";

    
    


    while($row=mysqli_fetch_assoc($result10)){
    
    $cmpno=$row['Complaint_no'];
    $arr3=array();
    $result2=mysqli_query($con,"Select * from expertservices where Complaint_no=$cmpno") or die("Could not read table".mysqli_error($con));
    $row2=mysqli_fetch_array($result2);
    $expert=$row2['ExpertName'];
    $result3=mysqli_query($con,"Select * from expert where Username='$expert'") or die("Could not read table".mysqli_error($con));
    $row3=mysqli_fetch_array($result3);
    $expertph=$row3['Phone'];
    $expertemail=$row3['Email'];
    $status=$row2['Status'];
    echo "<tbody><tr>";
    echo "<td>".$row['Complaint_no']."</td>";
    $cmno=$row['Complaint_no'];
    echo "<td width='200' height='100'>".$row['Complaint_description']."</td>";
    echo "<td width='100'>".$row['Address']."</td>";
    echo "<td>"."<a href='show.php?complaint=$cmno' style='color:black' id='show$cmno' onclick='btnclicked()'>Click here to view image</a><br>[or]<br><a href='upload-designmore.php?complaint=$cmno' style='color:black' id='upload$cmno' onclick='btnclicked()'>Upload more photos</a>"."</td>";
    echo "<td>".$expert."</td>";
    echo "<td>".$expertph."</td>";
    echo "<td>".$expertemail."</td>";
    echo "<td>".$status."</td>";
    echo "</tr></tbody>";
    
    }
    

echo "</table>";
$arr3=array_diff($arr,$arr2);
?><hr><br>
<?php

        if(!empty($arr3)){?>
<form action="#" method="POST">
Select the Complaint Number to prove feedback:<br><br>
<select name="review" id="Booking" style='border:solid;
    text-align: center;
    width:190px;
    height:30px;
    font-size:15px;
    border-radius: 15px;'><?php       
        foreach($arr3 as $item){
?>

          <option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option><br><br>
          <?php
          }
        
    
          ?>

          </select><br><br>
          <input type="submit" value="Rate" name='Submit3' id='rate' onclick="btnclicked()">
    </form>
      <?php  
        }
      if(isset($_POST['Submit3'])){
      if(isset($_POST['review'])){
          $_SESSION['cmpno']=$_POST['review'];
          echo "<script type='text/javascript'>window.top.location='rating.php';</script>"; exit;
      }  
      else{
          echo 'Complaint Number not Selected or Already Rated every service';
      }
        }
}
          ?>
          

    
    </body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <button type="button" class="btn btn-outline-success" onclick="recon('contact')" id='speak'>Speak/Read</button>
    <textarea id="results" class="form-control" cols="80" rows="5" ></textarea>
    </html>