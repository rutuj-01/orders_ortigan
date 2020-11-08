<?php
include "conn.php";

$ids=$_GET['order_id'];
if(isset($_GET['submit']))
{
	
	$name=$_GET['prod_name'];
	$quant=$_GET['quantity'];
	$pay_mode=$_GET['payment_mode'];

	$updQuery="UPDATE ORDERS SET prod_name='$name', quantity='$quant', payment_mode='$pay_mode' where order_id='$ids' ";
	$result=mysqli_query($conn,$updQuery);
	if($result)
	{
		echo "Updated successfullyyy";
	}
	else
	{
		echo "ERRRROORRR" .mysqli_error($conn);
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container"> 
	<?php 
	
	$update="SELECT * FROM orders where order_id='$ids'";

	$ros=mysqli_query($conn,$update);
	$row=mysqli_fetch_assoc($ros);

// $id=$_GET['order_id'];
	//echo $row['order_id'];
	var_dump( $_GET);
	//var_dump($_SESSION);
	?>
	<br>
	<form action="update.php" method="get">
		<input type="hidden" name="order_id" value="<?php echo "$ids";?>">
		<label>Product name</label>
		<br>
		<input type="text" name="prod_name" value="<?php echo $row['prod_name'];?>">
		<br>
		<label>Quantity</label>
		<br>
		<input type="text" name="quantity" value="<?php echo $row['quantity'];?>">
		<br>
		<label>Payment Mode</label>
		<br>
		<input type="text" name="payment_mode" value="<?php echo $row['payment_mode'];?>">
		<br>
		<!-- <input type="none" name="none" value="<?php ?>"> -->
		<input type="submit" name="submit" value="submit">
	</form>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

