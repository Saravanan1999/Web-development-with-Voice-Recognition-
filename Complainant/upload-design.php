<?php
	
		include('upload-code.php'); // Include upload code Script page.
		
	?>
	
<!DOCTYPE html>
<html lang="en">
<head>
<script src="js/browser.js"></script>
<script src='js/contact.js'></script>
<script src="clickbtn.js"></script>
<script src='voicerecon.js'></script>
	<title>Image Upload</title>
	<style>
	
		html, body{background: #ececec; height: 100%; margin: 0; font-family: Arial;}
		.main{height: 100%; display: flex; justify-content: center;}
		.main .image-box{width:300px; margin-top: 30px;}
		.main h2{text-align: center; color: black}
		.main .tb{width: 100%; height: 40px; margin-bottom: 5px; padding-left: 5px;}
		.main .file_input{margin-top: 10px; margin-bottom: 10px;}
		.main .btn{width: 100%; height: 40px; border: none; border-radius: 3px; background: black; color: #f7f7f7;}
		.main .msg{color: red; text-align: center;}
	
	</style>
	</head>

	<body onload="clickbtn()" onload="detectbrow()">
	<div class="container main" >
		<div class="image-box">
			<h2>Image Upload</h2>
			<form method="POST" name="upfrm" action="" enctype="multipart/form-data">
				<div>
					<input type="text" placeholder="Enter image name" name="img-name" class="tb" id='name'>
					<input type="file" name="fileImg" class="file_input"  id='file' onclick="btnclicked()">
					<input type="submit" value="Upload" name="btn_upload" class="btn" id='submit' value="Image" placeholder="image" onclick="btnclicked()">
				</div>
			</form>
			<div class="msg">
            <strong>
		<?php if(isset($error)){echo $error;}?>
	</strong>
			</div>
		</div>
	</div>
	</body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <button type="button" class="btn btn-outline-success" onclick="recon('contact')" id='speak'>Speak/Read</button><br>
    <textarea id="results" class="form-control" cols="80" rows="5" ></textarea>
	</html>