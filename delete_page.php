<?php
session_start();

include"db.php";

include("header.php");

$email=$_SESSION["email"];
if(!isset($_SESSION["email"])){
	header("Location:login.php?error=Login required");
}

$id=$_GET['id'];

	$statement = $conn->prepare("SELECT * FROM page WHERE id=:id");
	$statement->bindParam(":id",$id);
	$statement->execute();
	$row = $statement->fetch(PDO::FETCH_BOTH);
	
	if(isset($_POST['no'])){
		header("Location:dashboard.php");
		}
	if(isset($_POST['yes'])){
		
	$stmt = $conn->prepare("DELETE FROM page WHERE id=:id");
	$stmt->bindParam(":id",$id);
	$stmt->execute();
		
	header("Location:dashboard.php?delete=Page  delete was successful");
		}
?>

<p>Do you want to delete page: <b><?php echo $row['title']?></b>
<form method="post">
<input type="submit" value="Yes" name="yes">

<input type="submit" value="No" name="no">
</form>