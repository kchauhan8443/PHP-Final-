<?php

include("db.php");

if(isset($_FILES['image'])){ $errors= array(); 
$file_name = $_FILES['image']['name']; 
$file_size = $_FILES['image']['size']; 
$file_tmp = $_FILES['image']['tmp_name']; 
$file_type = $_FILES['image']['type']; 
$file_ext = strtolower(end(explode('.',$file_name))); 
$extensions= array("jpeg","jpg","png"); 

if(in_array($file_ext,$extensions)=== false){ 
$errors[]="extension not allowed, please choose a JPEG or PNG file."; 
} 
if($file_size > 2097152) { 
$errors[]="File size must be less 2 MB";
 } 
if(empty($errors)==true) { 
move_uploaded_file($file_tmp,"logo/".$file_name); 
echo "Success"; 

$stmt = $conn->prepare("INSERT INTO logo VALUES(NULL,:img)");
  		$stmt->bindParam(":img",$file_name);
  		$stmt->execute();
}else{ print_r($errors); 

$id = $conn->lastInsertId();
} 
}

		
 ?> 

 <form action = "" method = "POST" enctype = "multipart/form-data"> 
<input type = "file" name = "image" /> 
<input type = "submit"/> 			

 <ul> 
<li>Sent file: <?php echo $_FILES['image']['name']; ?> 
<li>File size: <?php echo $_FILES['image']['size']; ?> 
<li>File type: <?php echo $_FILES['image']['type'] ?> 
</ul> 
</form> 

