<!DOCTYPE html>
<html lang="en">
<head>
<script src="js/browser.js"></script>
<script src='js/contact.js'></script>
<script src="clickbtn.js"></script>
<script src='voicerecon.js'></script>

<?php include('header.php')?>
<hr><br><br>
<style>
    .filed{
    width:400px;
    height:400px;
    border:solid;
    padding:20px;
}
    </style>
<?php
session_start();
$user=$_SESSION['user'];
$des=$_SESSION['des'];
$address=$_SESSION['address'];
$n=$_SESSION['n'];
?>
<link href=homestyle.css rel="stylesheet" type="text/css"/>
<body onload="clickbtn()" onload="detectbrow()"><center>
    <div class='filed'>
        
        <h3>Your complaint has been filed successfully</h3>
        <h4>Complaint Details:</h4>
        <b>Complaint.no:</b><?php echo $n?><br>
        <b>Description:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><br><?php echo $des?><br>
        <b>Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><br><?php echo $address?><br><br><br>
        
</div><br>
<a href="home.php" style='text-decoration:none;color:black'><u>Go to home page<u></a>
</body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <button type="button" class="btn btn-outline-success" onclick="recon('contact')" id='speak'>Speak/Read</button>
    <textarea id="results" class="form-control" cols="80" rows="5" ></textarea>
</html>


