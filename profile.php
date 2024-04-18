<?php
include("con1.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<center>
<div class="product"><br>
<a href="dashboard.php"><p style="color:white;text-decoration: none;">Home</p></a>	
<?php
if (isset($_POST['profile'])) {
	$id=$_POST['id'];
	$query=mysqli_query($con1,"SELECT * FROM auth where id='$id'");
$row=mysqli_fetch_assoc($query);
}
?>
<form action="productengine.php" method="post">
	<input type="hidden" value="<?php echo  $row['id'] ?>" name="id">
	<input class="in1" type="text" value="<?php echo $row['username'] ?>" name="username">
	<input class="in1"type="email" value="<?php echo $row['email'] ?>" name="email">
	<input class="in1"type="text" value="<?php echo $row['password'] ?>" name="password"><br>
<button class="button1" name="updateprofile">Save</button>
</form>
<?php
if (isset($_POST['delete'])) {
	$id=$_POST['id'];

	$query=mysqli_query($con1,"Delete from product where id='$id'");
	if ($query==true) {
		echo '<script>window.location.href="dashboard.php";alert("Item deleted successfully");</script>';
	}
}

?>


</div>
</center>	
</body>
</html>

<style type="text/css">
	.button1{
		position: relative;
		top: 150px;
		border: none;
		background-color: #808080;
		width: 100px;
		height: 30px;
		color: white;
		transition: 0.1s;
	}
	.button1:hover{
		transform: scale(1.1);
	}
	.product{
		width: 50%;
		height: 400px;
		background-color: #333;
		border-radius: 20px;
		position: relative;
		top: 100px;
	}
	.in1{
		width: 70%;
		height: 30px;
		position: relative;
		top: 90px;
		margin-bottom: 20px;
		border-radius: 10px;
		border: none;
	}
</style>