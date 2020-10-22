<?php

$err=array();
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	if(strlen($password) <8 || empty($password))
	{
		array_push($err,"password");

	}
	if(empty($email))
	{
		array_push($err, 'email');
	}
	if(empty($name))
	{
		array_push($err, 'name');
	}


	if(count($err)==0)
	{
		echo "REGIstered succesfully";
		echo "$name<br>";
		echo "$password<br>";

		include 'conn.php';
		$query="INSERT INTO register (name,email,pass) VALUES ('$name','$email','$password')";
		$res=mysqli_query($conn,$query);

		if($res)
		{
			echo "REGISTERED succesfully";
			header('location:login.php');
		}
		else{
			echo "ERROR" . mysqli_error($conn);
		}

		}
	// var_dump($err);
	// var_dump($_POST);
} 

if(!isset($_POST['submit']) || count($err) > 0)
{
?>


<!DOCTYPE html>

<html>
<head>
	<title>LOGIN</title>
</head>
<body>
	<h1>REGISTER</h1>
	<form action="index.php" method="post">
		
		<label >Name</label>	
		<span style="color: red"> <?php if(in_array('name',$err)) {echo "NAME required";} ?> </span>
		<br>
		<input type="text" name="name">
		<br>
		<label>Email</label>
		<span style="color: red"> <?php if(in_array('email',$err)) {echo "email required";} ?> </span>
		<br>
		<input type="email" name="email">
		<br>
		<label>Password</label>
		<span style="color: red"> <?php if(in_array('password',$err)) {echo "pass should be more than 8";} ?></span>
		<br>
		<input type="Password" name="password">
		
		<br>
		<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>

<?php
}
// else{
// 	header('location:login.php');
// }
?>