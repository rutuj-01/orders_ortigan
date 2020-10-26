<?php
include "conn.php";

$id=$_GET['order_id'];
if(isset($_GET['submit']))
{
	$name=$_GET['prod_name'];
	$quant=$_GET['quantity'];
	$pay_mode=$_GET['payment_mode'];

	$updQuery="UPDATE ORDERS SET prod_name='$name', quantity='$quant', payment_mode='$pay_mode' where order_id='$id' ";
	$result=mysqli_query($conn,$updQuery);
	if($result)
	{
		echo "Updated successfullyyy";
	}
	else
	{
		echo "ERRRROORRR";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 

	$update="SELECT * FROM orders where order_id='$id'";

	$ros=mysqli_query($conn,$update);
	$row=mysqli_fetch_assoc($ros);

// $id=$_GET['order_id'];
	echo $row['order_id'];?>
	<form action="update.php?order_id=<?php echo $row['id'];?>" method="get">
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
	<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>

