<?php
session_start();

include"db.php";

include("header.php");

$email=$_SESSION["email"];
if(!isset($_SESSION["email"])){
	header("Location:login.php?error=Login required");
}

$id= $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM page WHERE id=:id");
	$stmt->bindParam(":id",$id);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_BOTH);
	
	if(isset($_POST['edit'])){
		$error=[];
		
		if(empty($_POST['title'])){
		$error['title'] = "Please enter Title";
		}
		if(empty($_POST['content'])){
			$error['content'] = "Please enter content";
			}
	
	if(empty($error)){
		
		$stmtt = $conn->prepare("UPDATE page SET title=:title, content=:con WHERE id=:id ");
		$stmtt->bindParam(":id",$id);
		$stmtt->bindParam(":title",$_POST['title']);
		$stmtt->bindParam(":con",$_POST['content']);
		$stmtt->execute();
		
		
	$stmt = $conn->prepare("SELECT * FROM page WHERE id=:id");
	$stmt->bindParam(":id",$id);
	$stmt->execute();
	$roww = $stmt->fetch(PDO::FETCH_BOTH);
		
		$success="You have successfully edit page address to ".$roww['email'];
		
		header("Location:index.php?id=$id");
		
		}
	}
?>


<html>
<head>
	<title></title>
</head>
	<body>
	<form method="post">
		<p>Edit Page</p>
		
		<p><?php if(isset($success)){
			echo $success;
			}?></p>
		<p>Title</p>
		<p><?php 
if(isset($error['title'])){
	echo $error['title'];
	}
?></p>
		<input name="title" value="<?php if(isset($roww['title'])){echo $roww['title'];
			}else{ echo $row['title'];}
			?>">
			
			<p>Content</p>
			<p><?php 
if(isset($error['content'])){
	echo $error['content'];
	}
?></p>
		<textarea name="content" ><?php if(isset($roww['content'])){echo $roww['content'];
			}else{ echo $row['content'];}
			?>"></textarea>
			
		<input type="submit" value="Edit" name="edit">
	</form>
	</body>
</html>