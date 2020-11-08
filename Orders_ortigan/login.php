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
	<div class="container">
	<h2>LOGIN</h2>
	<form action="login.php" method="post">
		<div class="form-group">
		<label>Email</label>
		<br>
		<input type="email" name="email">
		</div>

		<br>

		<div class="form-group">
		<label>Password</label>
		<br>
		<input type="Password" name="password">
		</div>
		<br>
		<input type="submit" name="submit" value="submit" class="btn btn-success">
	</form>
	</div>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>


<?php
}
?>