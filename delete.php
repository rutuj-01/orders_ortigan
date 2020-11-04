<?php
include "conn.php";

	
$ids=$_GET['order_id'];
// sql to delete a record
echo $ids;
$sql = "DELETE FROM orders WHERE order_id='$ids'";
#$rows=mysqli_fetch_assoc($sql);
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}



?>

?>