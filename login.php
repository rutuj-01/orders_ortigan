<?php
include 'conn.php';
$err=array();
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];

	if($email=="")
	{
		array_push($err, 'email');
	}
	if(empty($password))
	{
		array_push($err, 'password');
	}
	echo "$email";
	echo "$password";	
	if(count($err)==0)
	{
		$logQuery= "SELECT * from register where email='$email'";
		echo "$logQuery";
		$ros=mysqli_query($conn,$logQuery);
		$row=mysqli_fetch_assoc($ros);
		var_dump($row);
		if($row['pass']== $password)
		{
			echo "Successfully logged in";
			session_start();
			$_SESSION['email']=$email;
			$_SESSION['id']=$row['id'];
			header('location:orders.php');
			
		}
		else
		{
			header('location:index.php');
		}

	}
}	

if(!isset($_POST['submit'])  || count($err)>0)
{


?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
</head>
<body>
	<h2>LOGIN</h2>
	<form action="login.php" method="post">
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
}
?>