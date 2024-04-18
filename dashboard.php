<?php
session_start();
include('con1.php');
include("pdo.php");
if (!isset($_SESSION['login'])) {
	  echo '<script>window.location.href="index.php";alert("access denied");</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>



<div class="welcome">
<h1 class="welcoming"> Welcome, <?php
$id=$_SESSION['ID'];
$query=mysqli_query($con1,"SELECT * FROM auth where id='$id'");
$row=mysqli_fetch_assoc($query);
echo $row['username'];
?>
	</h1>
</div>
<div class="nav">
	<form method="post" action="search.php">
		<input class="searchinput" name="name" placeholder="product" type="text" >
		<button class="searchbutton" name="search">Search</button>
	</form>
	
<?php
$id=$_SESSION['ID'];
?>
<form action="profile.php" method="post">
		<input  type="hidden" value="<?php echo $id?>" name="id">
		<button class="p" name="profile">View profile</button>
	</form>
	<form method="post">
		<button class="l" name="logout">Logout</button>
	</form>
</div>


<?php
if (isset($_POST['logout'])) {
	
	session_destroy();
	echo '<script>window.location.href="login.php"</script>';
}

?>
<style type="text/css">

	.p{
		height:30px;
	background-color: grey;
	position: relative;
	background-color: #333;
	color: white;
	border:none;
	left: 40px;
	top: 10px;
	transition: 0.1s;
}
.p:hover{
	transform: scale(1.1);
	background-color: grey;
}

.l{
height:30px;
	background-color: grey;
	position: relative;
	background-color: #333;
	color: white;
	border:none;
	left: 40px;
	top: 10px;
	transition: 0.1s;
}
.l:hover{
	transform: scale(1.1);
	background-color: grey;
}

</style>


<form action="productengine.php" method="post"><br>
	<input class="n1" placeholder=" name" type="text" name="name"><br>
	<input class="n1" placeholder=" Description"type="text" name="des"><br>
	<input class="n1" placeholder=" Price"type="number" name="price"><br>
		<input class="n1" name="u_id" placeholder=" Price"type="hidden" value="<?php echo $_SESSION['ID'] ?>"><br>
	<button class="addbutton" name="add">Add Product</button>
</form><br>
       <center><h1 class="h2">Product List</h1>
<div class="table">
	
<?php
$page=2;
$stmt=$pdo->prepare("SELECT COUNT(*) FROM product ");
$stmt->execute();
$entries=$stmt->fetchColumn();
$totalPages=ceil($entries /$page);

$pagenow=isset($_GET["page"])? $_GET["page"] : 1;


$x=($pagenow-1)* $page;
$y=$page;

$sql="SELECT * FROM product where u_id='$id' ORDER BY id LIMIT $x, $y";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$users=$stmt->fetchAll();
?>

<ul>
<table>
<tr>
<th>Product Name</th>
<th>Description</th>
<th>Price</th>
<th>Action</th>
</tr>
	<?php

foreach($users as $u){
?>

<tr>
<td><?php echo $u['name']?></td>
<td><?php echo $u['des']?></td>
<td><?php echo $u['price']?></td>
<form action="edit.php" method="post">
  <td><input type="hidden" value="<?php echo $u['id']; ?>" name="id">
	 <button class="edit" name="edit">Edit</button>
	   <button class="delete" name="delete">Delete</button>
</form>
</tr>


<?php
}
?>
</table>
<?php

	?>
</ul>


<div id="dashboard"><?php

for($i=1; $i<=$totalPages;$i++){
	printf("<a style='position:relative;top:80px;padding:10px' href='dashboard.php?page=%u'>%u</a>", $i, $i);
}
?>
	
</div>
</div>

<div class="aboutus"><br>
	<h1 style="font-family: 'Microsoft Himalaya', Times, serif;

;text-indent: 20px;">About us</h1>
<img class="img1" src="pic1.jfif" width="40%" height="380px" style="position: relative; top:100px;box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
<img class="img1" src="pic2.jfif" width="40%" height="380px" style="position: relative; top:100px;box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">

</div>
<div class="aboutus">
	<div class="div1"><center><h2>Hello I am, Joelly C salado</h2></center>
<p style="width:70%;line-height: 30px;">I am the developer for this project and our goal is to inhance business utilization through our system. We are the business owner and the developer of this project and our target is to obtain a good quality services and reliable strategies into success.</p>
	</div>
	<div class="div2"><center><h2>Hello I am, Justine Sumande Cubon</h2>
<p style="width:70%;line-height: 30px;">I am the designer for this project and our goal is to inhance business utilization through our system. We are the business owner and the developer of this project and our target is to obtain a good quality services and reliable strategies into success.</p>
	</center></div>
</div>



</center>
</body>
</html>

<style type="text/css">



.div1,.div2{
	width: 50%;
	
	box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
}

	.img1{
		margin-left: 30px;
	}
	.aboutus{
		width: 100%;
		box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
		display: flex;
		height: 500px;
	}
	.edit{

	}
	.delete{
    background-color: red;
  border: none;
  color: white;
  padding: 15px 32px;
  margin: 2%;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
}
.edit{
    background-color: blue;
  border: none;
  color: white;
  padding: 15px 32px;
  margin: 2%;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
}
	.a1{
		position: relative;
		top: 100px;
	}
	table{
		width: 80%;
		position: relative;
		top: 40px;
		overflow: auto;
		height: 100px;
		border: none;
  
	}
	th{
		background-color: #333;
		color: white;
	}
	td{
text-align: center;
border: none;
box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
	}
	.table{
		box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
		width: 100%;
		height: 400px;
		overflow: auto;
	}
	.n1{
		position: relative;
		width: 50%;
		left: 20px;
		margin-bottom: 10px;
		height: 30px;
	}
.h2{
	font-family: "Comic Sans MS", Times, serif;;
}
	.addbutton{
		transition: 0.1s;
		width: 230px;
		position: relative;
		left: 20px;
		
		height: 30px;
		color: white;
		background-color: #808080;
		border:none;
	}
	.addbutton:hover{
		transform: scale(1.1);
	}
    .welcoming{
    	font-family: Constantia, Times, serif;
    	text-indent: 20px;
    	position: relative;
    	top: 10px;
    	color: white;
    }
	.welcome{
		width: 100%;
		height: 100px;
		background-color: #808080;
		border-top-right-radius: 10px;
		border-top-left-radius: 10px;
	}
	.nav{
		width: 100%;
		height: 50px;
		background-color: #333;
		display: flex;
	}
	.searchinput{
height: 30px;
	}
	.searchbutton{
height: 30px;
background-color: #FFFFFF;
border: none;
transition: 0.1s;
	}
	.searchbutton:hover{
transform: scale(1.1);
	}
	.searchbutton,.searchinput{
		position: relative;
		top: 8px;
		left: 20px;
	}
</style>