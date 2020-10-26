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
	<form action="new_order.php" method="get">
		<label>product name</label>
		<br>
		<input type="text" name="prod_name">
		<br>
		<label>product price</label>
		<br>
		<input type="text" name="prod_price">
		<br>
		<label>product quantity</label>
		<br>
		<input type="text" name="prod_quant">
		<br>
		<label>PAYMENT MOde</label>
		<br>
		<input type="text" name="payment_mode">
		<br>
		<label>order status</label>
		<br>
		<input type="text" name="order_status">
		<br>
		<input type="submit" name="submit" value="submit">
	</form>

</body>
</html>