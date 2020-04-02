<!DOCTYPE html>
<html lang="en">
<head>
<script src="js/browser.js"></script>
<link href=homestyle.css rel="stylesheet" type="text/css"/>
<link href=complaintstyle.css rel="stylesheet" type="text/css"/>
<script src='js/contact.js'></script>
<script src="clickbtn.js"></script>
<script src='voicerecon.js'></script>
<?php include('header.php')?>
</head>
<body onload="clickbtn()" onload="detectbrow()">
<hr ><center><BR><BR><BR>
        <div class='complaint'>
        <h3 style="font-size:25px">File a Complaint</h3>
        <form action="complaint.php" method="POST">
            <p style="font-size:20px">Describe the issue:</p>
            <textarea rows = "7" cols = "60" name = "description" style="border:solid 2px"class="form-control" id='description'></textarea><br><br>
            <p style="font-size:20px">Enter the address of the affected area:</p>
            <textarea rows = "3" cols = "60" name = "address" style="border:solid 2px" class="form-control" id='address'></textarea><br><br><br><br>
            <input type="Submit" name="Submit" style="font-size:20px" id='submit' onclick="btnclicked()">&nbsp;&nbsp;<input type="reset" style="font-size:20px" id='reset'>
</form>
<?php
if(isset($_POST['Submit'])){
    
    session_start();
    $user=$_SESSION['user'];
    $des=$_POST["description"];
    $address=$_POST["address"];
    $con=Mysqli_connect('127.0.0.1',"root","","greivance redressal");
    $result=mysqli_query($con,"Select * from users where username='$user'") or die("Could not read table");
    $row=mysqli_fetch_array($result);
    $email=$row['Email'];
    $phno=$row['Phone'];
    $result1=mysqli_query($con,"Select max(Complaint_no) from complaint");
    $row1=mysqli_fetch_array($result1);
    $n=$row1['max(Complaint_no)'];
    $n1=$n+1;
    $result2=mysqli_query($con,"Insert into complaint values($n1,'$user','$email','$phno','$des','$address')") or die('Couldnt insert values'.mysqli_error($con));
    $_SESSION['des']=$des;
    $_SESSION['address']=$address;
    $_SESSION['n']=$n1;
?>
<form action='complaint.php'method='POST'>
Do you want to upload photos?<br><br>
<a href='upload-design.php' style='text-decoration:none;color:white;border:solid 2px;background:black;padding:7px;border-radius:30px'id='yes' onclick="btnclicked()">Yes</a>&nbsp;
<a href='filed.php' style='text-decoration:none;color:white;border:solid 2px;background:black;padding:7px;border-radius:30px' id='no' onclick="btnclicked()">No</a>

<?php
}
?>
        
        
    
    </body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <button type="button" class="btn btn-outline-success" onclick="recon('contact')" id='speak'>Speak/Read</button>
    <textarea id="results" class="form-control" cols="80" rows="5" ></textarea>
    </html>