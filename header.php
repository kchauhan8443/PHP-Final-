<style>
*{
margin:0;
padding:0;
}

#nav {
display:inline;
border:1px solid green;
width:40px;
height:40px;
background-color:black;
margin:3px;
}

 a{
color:white;
text-decoration:none;
}

table,tr,td,th{
border:1px solid;
}
td,th{
width:100px;
text-align:center;
}
#nav-bar{
background-color:grey;
}

td a{
color:blue;
}
</style>

<div id="left-head">
<?php
$statementt = $conn->prepare("SELECT id FROM logo");
	$statementt->execute();
	$id = $conn->lastInsertId();
$id = $statementt->fetchColumn();
	
$statementtt = $conn->prepare("SELECT * FROM logo WHERE id=:id");
	$statementtt->bindParam(":id",$id);
	$statementtt->execute();
	while($roww = $statementtt->fetch(PDO::FETCH_BOTH)){
?>
<a href="index.php"><img src="logo/<?=$roww['img']?>" width="50px" height="50px"></img></a>


<?php }?>

</div>

<div id="nav-bar">
<p>
<?php
$statement = $conn->prepare("SELECT * FROM page");
	$statement->execute();
	while($row = $statement->fetch(PDO::FETCH_BOTH)){
?>
<p id="nav"><a href="?id=<?=$row['id']?>"><?=$row['title']?></a>
<?php }?>
</div>
</p>
<?php
if(isset($_SESSION["email"])){
?>
<div id="nav-bar"><p id="nav"><a href="dashboard.php">Dashboard</a></p><p id="nav"><a href="upload_logo.php">Upload Logo</a></p><p id="nav"><a href="create_page.php">Create page</a></p><p id="nav">  <a href="logout.php">Logout</a>  </p></div>
<?php }else{?>


<div id="nav-bar"><p id="nav"><a href="register.php">Register</a></p><p id="nav"><a href="login.php"> Login</a></p></div>

<?php }?>
