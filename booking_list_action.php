<?php
	include("include.php");
	
	// if post is set
	if(isset($_POST['act'])){
		$act=$_POST['act'];
		
		if($act=='Delete'){
			// create a delete query
			$sql="DELETE FROM booking WHERE booking_id='".$_POST['booking_id']."'";
		// execute the query
		if ($mysqli->query($sql) == true) {
			// redirect to the index page
			header("Location: my_bookings.php");
		} else {
			echo "Error: " . $sql . "<br>" , $mysqli->error;
		}
	}
		if($act=='Edit'){
			// show the edit form
			include_once('edit_booking_form.php');
	}
}
?>