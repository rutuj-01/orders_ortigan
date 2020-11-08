<?php

include 'conn.php';

session_start();
echo $_SESSION['id'];
//var_dump($_SESSION);


if(isset($_SESSION['email']) && isset($_GET['submit']))
{
	$custID=$_SESSION['id'];
	$prod_name=$_GET['prod_name'];
	$prod_price=$_GET['prod_price'];
	$prod_quant=$_GET['prod_quant'];
	$pay_mode=$_GET['payment_mode'];
	$order_status=$_GET['order_status'];

	echo $_SESSION['email'];


	$insQuery="INSERT INTO orders(custID,prod_name,prod_price,quantity,payment_mode,order_status) VALUES('$custID','$prod_name','$prod_price','$prod_quant','$pay_mode','$order_status')";

	$res=mysqli_query($conn,$insQuery);
	if($res)
	{
		echo "INSERTED";
		header('location:orders.php');
	}
	else
	{
		echo "ERRORRRR" .mysqli_error($conn);
	}
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
	<div class="container">
		<form action="new_order.php" method="get">
			<div class="form-group">
			<label>product name</label>
			<br>
			<input type="text" name="prod_name">
			</div>

			<div class="form-group">
			<label>product price</label>
			<br>
			<input type="text" name="prod_price">
			</div>
			
			<div class="form-group">
			<label>product quantity</label>
			<br>
			<input type="text" name="prod_quant">
			</div>
			<div class="form-group">
			<label>PAYMENT MOde</label>
			<br>
			<input type="text" name="payment_mode">
			</div>
			<div class="form-group">
			<label>order status</label>
			<br>
			<input type="text" name="order_status">
			</div>
			<input type="submit" name="submit" value="submit">
		</form>
	</div>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>