<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">

<?php 
session_start();

include"db.php";

$id = $_GET['id'];

include"header.php";

?>


<html>
<head>

</head>
<body>

<?php


if(isset($_GET['id'])){
	$stmt = $conn->prepare("SELECT * FROM page WHERE id=:id");
	$stmt->bindParam(":id",$id);
	$stmt->execute();
	while($roww = $stmt->fetch(PDO::FETCH_BOTH)){
	
?>
<title><?=$roww['title']?></title>

<p><b><?=$roww['title']?></b></p>

<p><?=$roww['content']?></p>

<?php }

}else{?>
<p>This is our landing page</p>

<?php }?>
</body>
</html>