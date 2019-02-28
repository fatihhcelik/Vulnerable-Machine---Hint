<!DOCTYPE html>
<html>

<body>

<div align="center">
<form action="" method="post" enctype="multipart/form-data">
    <br>
    <b>Select image : </b> 
    <input type="file" name="file" id="file" style="border: solid;">
    <input type="submit" value="Submit" name="submit">
</form>
</div>
<?php

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$rand_number = rand(1,100);
	$target_dir = "uploads/";
	$target_file = $target_dir . md5(basename($_FILES["file"]["name"].$rand_number));
	$file_name = $target_dir . basename($_FILES["file"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
	$type = $_FILES["file"]["type"];
	$check = getimagesize($_FILES["file"]["tmp_name"]);

	if($check["mime"] == "image/png" || $check["mime"] == "image/gif"){
		$uploadOk = 1;
	}else{
		$uploadOk = 0;
		echo ":)";
	} 
  if($uploadOk == 1){
      move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.".".$imageFileType);
      echo "File uploaded /uploads/?";
  }
}
?>

</body>
</html>
