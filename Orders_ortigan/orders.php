<?php

session_start();

include 'conn.php';
if(isset($_SESSION['email']))
{

	$email=$_SESSION['email'];
	$ID=$_SESSION['id'];
	echo "$ID";
	echo "$email";
	// $idquery="SELECT id from register where email='$email'";
	// $res=mysqli_query($conn,$idquery);
	// $row=mysqli_fetch_assoc($res);

	// $ID=$row['id'];
	// // $_SESSION['id']=$ID;

	$joinque="SELECT * from register INNER JOIN orders on register.id = orders.custID where register.id='$ID'";
	$result=mysqli_query($conn,$joinque);

	//$rows=mysqli_fetch_assoc($result);
	//var_dump($rows);
	// echo "$rows['name']";
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<style>
			/*table, th, td ,td{
			  border: 1px solid black;
			  border-collapse: collapse;
			}*/
		</style>
	</head>
	<body>
		<div class="container">		
			<a href="new_order.php"><button >New Order</button></a>

			<a href="logout.php"><button style="margin: 20px;">LOGOUT</button></a>
		
		<br>
		<table class="table table-hover table-dark">
			<th>
				<tr>
					<td>id</td>	
					<td>name</td>
					<td>email</td>
					<td>pass</td>
					<td>order_id</td>
					<td>custID</td>
					<td>prod_name</td>
					<td>prod_price</td>
					<td>quantity</td>
					<td>payment_mode</td>
					<td>order_status</td>
					<td colspan="2">Changes</td>

				</tr>
			</th>
			<td>
				<?php
						while ($row = mysqli_fetch_assoc($result)) {

						?>
						<tr>
						<td><?php 
									$_SESSION['ord_id']=$row['order_id'];  
						 echo $row['id']; ?></td>
 						<td><?php	echo $row['name'];  ?></td>
						<td><?php	echo $row['email']; ?></td>
						<td><?php	echo $row['pass']; ?></td>
						<td><?php	echo $row['order_id']; ?></td>
						<td><?php	echo $row['custID']; ?></td>
						<td><?php	echo $row['prod_name']; ?></td>
						<td><?php	echo $row['prod_price']; ?></td>
						<td><?php	echo $row['quantity']; ?></td>
						<td><?php	echo $row['payment_mode']; ?></td>
						<td><?php	echo $row['order_status']; ?></td>

						<td><a href="update.php?order_id=<?php echo $row['order_id']; ?>"><button>Update</button>></a></td>
						<td><a href="delete.php?order_id=<?php echo $row['order_id']; ?>"><button>	Delete</button>></a></td>
						</tr>

						
					<?php	
						}
						
					?>
				
			</td>


		</table>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</div>
	</body>
	</html>

	<?php


}

else
{
	header('location:login.php');
}



?>