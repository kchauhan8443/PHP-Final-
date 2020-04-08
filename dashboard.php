<?php
session_start();

include"db.php";

$email=$_SESSION["email"];

include("header.php");

//validate session 
if(!isset($_SESSION["email"])){
	
	//if no sessiin goto login.php with error
	header("Location:login.php?error=Login required");
}

//fetch user data
$statement = $conn->prepare("SELECT * FROM admin WHERE email=:email");
	$statement->bindParam(":email",$email);
	$statement->execute();
	while($row = $statement->fetch(PDO::FETCH_BOTH)){
?>


<div class="container emp-profile bd">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <div class="file btn btn-lg btn-primary">
                              <div>

						</div>
                    </div>

                                                <p></p>Welcome <?=$row["email"]?></p>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=$row["email"]?></p>
                                            </div>
                                        </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

<p><b><?php 
	//check if there's success delete message
		if(isset($_GET['delete'])){
			
			//echo delete message
	echo $_GET['delete'];
	}?></b></p> 
	<p>Users</p>        
<table>
<th>Email</th>
<th>Edit</th>
<th>Delete</th>
<?php

//fetch all user data
$stmtt = $conn->prepare("SELECT * FROM admin");
	$stmtt->execute();
	while($roww = $stmtt->fetch(PDO::FETCH_BOTH)){
  ?>
<tr>
<td> <?= $roww['email']?> </td>
<td> <a href="edit_user.php?id=<?= $roww['id']?>">Edit</a> </td>
<td> <a href="delete_user.php?id=<?= $roww['id']?>">Delete</a> </td>
<tr>
<?php }?>

</table>
<br></br>
<p><b><?php 
	//check if there's success delete message
		if(isset($_GET['delete'])){
			
			//echo delete message
	echo $_GET['delete'];
	}?></b></p>
	<p>Pages</p>         
<table>
<th>Title</th>
<th>Edit</th>
<th>Delete</th>
<?php

//fetch all user data
$stmttt = $conn->prepare("SELECT * FROM page");
	$stmttt->execute();
	while($rowww = $stmttt->fetch(PDO::FETCH_BOTH)){
  ?>
<tr>
<td> <?= $rowww['title']?> </td>
<td> <a href="edit_page.php?id=<?= $rowww['id']?>">Edit</a> </td>
<td> <a href="delete_page.php?id=<?= $rowww['id']?>">Delete</a> </td>
<tr>
<?php }?>

</table>



        </div>
       <?php }?>