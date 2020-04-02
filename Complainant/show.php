<!DOCTYPE html>
<html lang="en">
<head>
<script src="js/browser.js"></script>
<script src="js/contact.js"></script>
<script src="clickbtn.js"></script>
<script src='voicerecon.js'></script>
<link href=division.css rel="stylesheet" type="text/css"/>
<link href=tablestyle.css rel="stylesheet" type="text/css"/>
<meta name="viewport" content="width=device-width, intial-scale=1.0"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
		body{background-color: white; color: #333;}
		.main{box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important; margin-top: 10px;}
		h3{background-color: black; color: black; padding: 15px; border-radius: 4px; box-shadow: 0 1px 6px rgba(57,73,76,0.35);}
		.img-box{margin-top: 20px;}
		.img-block{float: left; margin-right: 5px; text-align: center;}
		p{margin-top: 0;}
		img{width: 375px; min-height: 250px; margin-bottom: 10px; box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important; border:6px solid black;}
	</style>
</head>
<body onload="clickbtn()" onload="detectbrow()">
	
		<div class="container main">
			<center><h3 style='color:white'>Showing Images of Complaint Number:<?php $n=$_GET['complaint']; echo $n?></h3><center>
			<div class="img-box">
            <?php
			
	include "connection.php";

	$result = mysqli_connect($host,$uname,$pwd) or die("Could not connect to database." .mysqli_error());
	mysqli_select_db($result,$db_name) or die("Could not select the databse." .mysqli_error());
	$image_query = mysqli_query($result,"select * from image_table where Complaint_no=$n");
	while($rows = mysqli_fetch_array($image_query))
	{
		$img_name = $rows['img_name'];
		$img_src = $rows['img_path'];
	?>
	
	<div class="img-block">
	<a href="<?php echo $img_src; ?>"><img src="<?php echo $img_src; ?>" alt="" title="<?php echo $img_name; ?>" class="img-responsive" /></a>
	<p><strong><?php echo $img_name; ?></strong></p>
	</div>
	
	<?php
	}
	?>

			</div>
		</div><br><br><center>
		<button style='width:240px;text-align:center;border:solid;width:100px;border-radius:20px;outline:none;background: transparent;' id='back' onclick="goBack()"onclick='btnclicked()' id='back'>Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
	</body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<button type="button" class="btn btn btn-outline-success my-2 my-sm-0" onclick="recon('contact')" id='speak'>Speak/Read</button><br>
<textarea id="results" class="form-control" cols="80" rows="5" ></textarea>
</html>
	</html>