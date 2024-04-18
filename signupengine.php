<?php
include('con1.php');
?>
<?php
if (isset($_POST['signup'])) {
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
	$password=password_hash($password, PASSWORD_DEFAULT);

$query=mysqli_query($con1,"INSERT into auth (username,email,password) VALUES ('$username','$email','$password')");
	if($query==true){
		echo'<script>window.location.href="login.php";alert("Registered successfuly");</script>';
	}else{
		echo"Something went wrong";
	}
}

?>