<?php
include('con1.php');
?>

<?php
if (isset($_POST['add'])) {

$name=$_POST['name'];
$description=$_POST['des'];
$price=$_POST['price'];
$u_id=$_POST['u_id'];
$query=mysqli_query($con1,"INSERT into product(name,des,price,u_id) VALUES ('$name','$description','$price','$u_id')");
if ($query) {
  echo '<script>window.location.href="dashboard.php";alert("New product has been inserted successfully");</script>';	
}
}else if (isset($_POST['update'])) {
  $id=$_POST['id'];
  $name=$_POST['name'];
  $des=$_POST['des'];
  $price=$_POST['price'];

  $query=mysqli_query($con1,"Update product set name='$name',des='$des',price='$price' where id='$id'");
  if ($query==true) {
   echo '<script>window.location.href="dashboard.php";alert("Item updated successfully");</script>';
  }
}

?>
<?php 

if (isset($_POST['updateprofile'])) {

  $id=$_POST['id'];
  $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    
   $query=mysqli_query($con1,"Update auth set username='$username',email='$email',password='$password' where id='$id'");
   if ($query==true) {
   echo '<script>window.location.href="dashboard.php";alert("profile updated successfully");</script>';
  }
}

 ?>