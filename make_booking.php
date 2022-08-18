<?php 
include('include.php');

// query to insert into booking from post form

$sql="INSERT INTO booking
(user_id,
username,
firstname,
surname,
destination_from,
destination_to,
day_and_date_from,
return_day_and_date,
adult_fare_no,
two_under_fare_no,
three_ten_fare_no,
elvn_sxtn_fare_no,
booking_date)

VALUES
(
'".$_POST['user_id']."',
'".$_POST['username']."',
'".$_POST['firstname']."',
'".$_POST['surname']."',
'".$_POST['destination_from']."',
'".$_POST['destination_to']."',
'".$_POST['day_and_date_from']."',
'".$_POST['return_day_and_date']."',
'".$_POST['adult_fare_no']."',
'".$_POST['two_under_fare_no']."',
'".$_POST['three_ten_fare_no']."',
'".$_POST['elvn_sxtn_fare_no']."',
'".$_POST['booking_date']."'
)";

//print($sql);
//exit;

// execute the query
if ($mysqli->query($sql) == true) {	
	// redirect to new page
	header('Location: my_bookings.php');
	exit();
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>