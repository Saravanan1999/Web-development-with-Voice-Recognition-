<?php
    $n=$_GET['complaint'];
	include "connection.php";

	$error = "";

	if (isset($_POST["btn_upload"]) == "Upload")
	{
		$uploadOk = 1;

		$file_tmp = $_FILES["fileImg"]["tmp_name"];
		$file_name = $_FILES["fileImg"]["name"];

		$image_name = $_POST["img-name"];

		$file_path = "photo/".$file_name;

		$target_file = $file_path . basename($file_name);	

	if($image_name == "")
	{
		$error = "Please enter Image name.";
	}

	else
	{
		if(file_exists($file_path))
		{
			$error = "Sorry,The <b>".$file_name."</b> image already exist.";
			$uploadOk = 0;
		}
			else
			{
				$result = mysqli_connect($host, $uname, $pwd) or die("Connection error: ". mysqli_error());
				mysqli_select_db($result, $db_name) or die("Could not Connect to Database: ". mysqli_error());
				mysqli_query($result,"INSERT INTO image_table(img_name,img_path,Complaint_no)
				VALUES('$image_name','$file_path',$n)") or die ("image not inserted". mysqli_error());
				move_uploaded_file($file_tmp,$file_path);
				$error = "<p align=center>File ".$_FILES["fileImg"]["name"].""."<br />Image saved into Table.";
				echo "<br>Successfully Uploaded";
			}
		}
		
	}
?>