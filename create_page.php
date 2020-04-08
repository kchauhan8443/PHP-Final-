<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">

<?php 
session_start();

include"db.php";

include("header.php");

$email=$_SESSION["email"];

//validate session 
if(!isset($_SESSION["email"])){
	
	//if no sessiin goto login.php with error
	header("Location:login.php?error=Login required");
}

if(isset($_POST['create'])){
	
	$error=[];
	
	if(empty($_POST['title'])){
		$error['title']="Please enter page title";
		
		}
		
	if(empty($_POST['content'])){
		$error['content'] ="Please enter page content";
		}
	
	if(empty($error)){
		
		$stmt = $conn->prepare("INSERT INTO page VALUES(NULL,:title,:content,NOW(),NOW())");
  		$stmt->bindParam(":title",$_POST['title']);
  		$stmt->bindParam(":content",$_POST['content']);
  		$stmt->execute();
		
		//after inputing data in database goto create page with success message
		header("Location:create_page.php?success=Page created successfully");

		
		
		}
		
	
	}

?>
<html>
<head>
    <title>Create page</title>


</head>
<body>

<p><?php if(isset($_GET['success'])){echo $_GET['success'];}?></p>
<form method="post">

<p>Create Page</p>

<p>Page Title</p>
<input type="text" name="title" >

<p>Page content</p>
<textarea name="content"></textarea>
<br></br>
<input type="submit" name="create" value="Create">

</form>
</body>
</html>