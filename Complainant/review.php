<html>
<?php include('header.php')?>
<?php 
session_start();
$n=$_SESSION['cmpno'];
?>
<hr><br><br><br>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="reviewstyle.css">
</head>
<body><center>
  <h3>Feedback<br>
  Complaint Number:</h3>
  <br>Your Ratings:<br>
  <div class="stars">

  <form action="#"method="POST">

    <input class="star star-5" id="star-5" type="radio" value='5' name="star"/>

    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" value='4' name="star"/>

    <label class="star star-4" for="star-4"></label>

    <input class="star star-3" id="star-3" type="radio" value='3' name="star"/>

    <label class="star star-3" for="star-3"></label>

    <input class="star star-2" id="star-2" type="radio" value='2' name="star"/>

    <label class="star star-2" for="star-2"></label>

    <input class="star star-1" id="star-1" type="radio" value='1' name="star"/>

    <label class="star star-1" for="star-1"></label><br>
    Comments:<br><br>
    <textarea rows = "7" cols = "40" name = "comment" style="border:solid 2px"></textarea><br><br>

    

    <input type="submit" name="submit">

  </form>

</div>
<?php
if(isset($_POST['submit'])){
    $rating=$_POST['star'];
    $com=$_POST['comment'];
    $con=Mysqli_connect('127.0.0.1',"root","","greivance redressal");
    $result=mysqli_query($con,"Insert into rating values($n,$rating,'$com')") or die("Could not read table");
    if($result){
        echo "<br>Rated Successfully";
    }
}
?><br><br>
<a href='mycomplaints.php'style='text-decoration:none;color:black;'><u>Go back</u></a>
    </body>
    
    
    </body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <button type="button" class="btn btn btn-outline-success my-2 my-sm-0" onclick="recon('home')" id='speak'>Speak/Read</button>
    <textarea id="results" class="form-control" cols="80" rows="5" ></textarea>
</html>