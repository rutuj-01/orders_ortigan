
<!DOCTYPE html>

<html>
<head>
	<title>LOGIN</title>
</head>
<body>
	<form action="register.php" method="post">
		<label>Name</label>
		<br>
		<input type="text" name="Name">
		<br>
		<label>Email</label>
		<br>
		<input type="email" name="email">
		<br>
		<label>Password</label>
		<br>
		<input type="Password" name="password">
		<br>
		<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>
<?php

echo "GPPG:E";
<!-- if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['password'];

	echo "$name";
	echo "$email";
} -->
?>