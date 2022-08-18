<?php 
include('include.php');
$sql="SELECT * FROM booking";
$res=$mysqli->query($sql);
$row = $res->fetch_assoc();

// query to edit the booking
$sql="UPDATE booking SET
user_id = '".$_POST['user_id']."',
username = '".$_POST['username']."',
firstname = '".$_POST['firstname']."',
surname = '".$_POST['surname']."',
destination_from = '".$_POST['destination_from']."',
destination_to = '".$_POST['destination_to']."',
day_and_date_from = '".$_POST['day_and_date_from']."',
return_day_and_date = '".$_POST['return_day_and_date']."',
adult_fare_no = '".$_POST['adult_fare_no']."',
two_under_fare_no = '".$_POST['two_under_fare_no']."',
three_ten_fare_no = '".$_POST['three_ten_fare_no']."',
elvn_sxtn_fare_no = '".$_POST['elvn_sxtn_fare_no']."'
WHERE booking_id ='".$row['booking_id']."'";

// execute the query
if ($mysqli->query($sql) == true) {	
	// redirect to new page	
	header("Location: my_bookings.php");
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


?>