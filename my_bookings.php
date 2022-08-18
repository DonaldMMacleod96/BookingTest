<?php include_once('include.php');
$sql="SELECT * FROM user";
$res=$mysqli->query($sql);
$row = $res->fetch_assoc();
?>
<html>
<title>My Bookings</title>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script>
</script>

<link rel="stylesheet" href="style.css"/>

</head>

<body>
<?php
	// include the top head file
	include('top_head.php');
?>

<div class="title">
	My Bookings
</div>
<div style="overflow-x:auto;">
	<table> <!-- table for my bookings -->
		<tr>
		<th>Booking ID</th> <!-- column title for booking ID -->
		<th>Destination From</th> <!-- column title for destination from --> 
		<th>Destination To</th> <!-- column title for destination to --> 
		<th>Day and Date From</th> <!-- column title for day and date from --> 
		<th>Day and Date To</th> <!-- column title for day and date to --> 
		<th>Booking Date</th> <!-- column title for booking date --> 
		<th>Adult Tickets</th> <!-- column title for adult tickets --> 
		<th>Edit or Delete Booking</td>  <!-- column title for day and date from --> 
	</tr>
	<?php
		$sql="SELECT * FROM booking WHERE user_id = '".$_SESSION['user_id']."'";
		$res=$mysqli->query($sql);
			if ($result = $mysqli->query($sql)) {
				while($row = $result->fetch_assoc()){
			$r='<tr>
					<td class="booking_id">'.$row['booking_id'].'</td>
					<td>'.$row['destination_from'].'</td>
					<td>'.$row['destination_to'].'</td>
					<td>'.$row['day_and_date_from'].'</td>
					<td>'.$row['return_day_and_date'].'</td>
					<td>'.$row['booking_date'].'</td>
					<td>'.$row['adult_fare_no'].'</td>
					<td>
						<form id="booking" method="POST" action="booking_list_action.php" id="'.$row['booking_id'].'">
							<input type="hidden" name="booking_id" value="'.$row['booking_id'].'"/>
							<input type="submit" name="act" value="Edit" />
							<input type="submit" name="act" value="Delete" />
						</form>
					</td>
				</tr>';
				print($r); // loop print
				}
			}
	?>
	</table>
</div>

</body>
</html>