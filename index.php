<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<center>
<div class="login">
	<br><h2 style="font-size: 30px;color: white;font-family: 'Bahnschrift Condendsed';">Sign-in</h2>
	<form action="loginengine.php" method="post">
		<input type="email" placeholder=" email" name="email">
		<input type="password" placeholder=" password" name="password"><br><br>
		<button name="login">Login</button>
	</form>
	<br>
	<a href="signup.php">Sign-up</a>
</div>
</center>


</body>
</html>

<style type="text/css">
	input{
		width: 50%;
		margin-bottom: 30px;
		position: relative;
		top: 20px;
		height: 30px;
	}
	button{
		transition: 0.1s;
		height: 30px;
		width: 60px;
		background-color: black;
		color: white;
		border: none;
		box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
	}
	button:hover{
		transform: scale(1.1);
	}
	.login{
		box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
		width: 35%;
		height: 350px;
		background-color: grey;
		border-radius: 20px;
		top: 100px;
         position: relative;
	}
</style>