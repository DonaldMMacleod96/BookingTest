<?php include_once('include.php');

$sql="SELECT * FROM booking WHERE booking_id='".$_POST['booking_id']."'"; // Select all from booking where booking id equals the same from post form
$res=$mysqli->query($sql); // bring sql result
$row = $res->fetch_assoc(); // row equals fetched results
$des_from = $row['destination_from']; // des_from equals destination_from
$des_to = $row['destination_to']; // des_to equals destination_to
$date_from = $row['day_and_date_from']; // date_from equals day_and_date_from
$date_to = $row['return_day_and_date']; // date_to equals day_and_date_to
$fare_1 = $row['adult_fare_no']; // fare_1 equals adult_fare_no
$fare_2 = $row['elvn_sxtn_fare_no']; // fare_2 equals elvn_sxtn_fare_no
$fare_3 = $row['three_ten_fare_no']; // fare_3 equals three_ten_fare_no
$fare_4 = $row['two_under_fare_no']; // fare_4 equals two_under_fare_no

?>
<html>
<title>Edit Booking Page</title>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  <!-- responsive content implemented -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> <!-- related to stylesheet and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> <!-- jquery link -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script> <!-- jquery link -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  <!-- jquery link -->
<script src="jquery-3.3.1.min.js"></script> <!-- jquery link -->
<script>

jQuery(document).ready(function($) {
	
	$("#depart_datepicker, #return_datepicker").each(function() { // jQuery function for the depart and return_datepicker
		$(this).datepicker({
			dateFormat: 'DD, dd/mm/yy',
			defaultDate: "+0w",
			changeMonth: true,
			minDate: -0, // any date before the current date cannot be selected
			onClose: function (selectedDate) { // jQuery function where return_datepicker does not backtrack on depart_datepicker
				var date2 = $('#depart_datepicker').datepicker('getDate');
				date2.setDate(date2.getDate() + 1);
				$("#return_datepicker").datepicker("option", "minDate", date2);
			}
		});
	});
	
	$("#destination_from, #destination_to").change(function () { // jQuery function where no destination value becomes an empty class
		if($(this).val() == "")
			$(this).addClass("empty")
		else
			$(this).removeClass("empty")
		});
		
	$("#destination_from, #destination_to").change(); // jQuery where the destination empty class function above comes into play
	
	$('#destination_from, #destination_to, #adult_fare_no').attr('required',1); // jQuery function where option requires one attribute
																				
	$("#depart_datepicker, #return_datepicker").change(function () { // jQuery function where no datepicker value becomes an empty class
		if($(this).val() == "")
			$(this).addClass("empty")
		else 
			$(this).removeClass("empty")
	});	
	
	$("#depart_datepicker, #return_datepicker").change(); // jQuery where the datepicker empty class function above comes into play
	
	$("#adult_fare_no, #elvn_sxtn_fare_no, #three_ten_fare_no, #two_under_fare_no").change(function () { // jQuery function where no
		if($(this).val() == "") // ticket value becomes an empty class
			$(this).addClass("empty")
		else
			$(this).removeClass("empty")
		});
		
	$("#adult_fare_no, #elvn_sxtn_fare_no, #three_ten_fare_no, #two_under_fare_no").change(); //jQuery where the fare empty class 
	// function above comes into play
	
	$('.form-control[name=destination_to]').on('change', function(e){ // jQuery function where a destination from destination_to is unavailable
		var thisVal = $(this).val(); // for destination_from
		$('.form-control[name=destination_from] option').each(function(){
			if(thisVal == $(this).attr('value')){
				$(this).attr('disabled', 'disabled'); // attribute is disabled
			}else{
				$(this).removeAttr('disabled');  // attribute is removed
			}
		});
	});
	
	$('.form-control[name=destination_from]').on('change', function(e){ // jQuery function where a destination from destination_from is unavailable
		var thisVal = $(this).val(); // for destination_to
		$('.form-control[name=destination_to] option').each(function(){
			if(thisVal == $(this).attr('value')){
				$(this).attr('disabled', 'disabled'); // attribute is disabled
			}else{
				$(this).removeAttr('disabled'); // attribute is removed
			}
		});
	});

});

</script>

<link rel="stylesheet" href="style.css"/>

</head>

<body>

<?php
	// include the top head file
	include('top_head.php');
?>

<div class="title">
	Edit Booking
</div>

<div class="booking">
	<form id="edit_booking_details" action="edit_booking.php" method="POST"> <!-- form for editing the booking details -->
		<div id="section">
			<div id="field1" class="field">
				Please edit your booking (Or go back to cancel) <!-- Text to prompt user to edit details needed to edit account -->
			</div>
		</div>
		<div id="section" class="hidden">
			<div>
				<input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?>" /> <!-- hidden input for session user ID -->
			</div>
			<div>
				<input type="hidden" name="username" value="<?= $_SESSION['username']; ?>" /> <!-- hidden input for session username -->
			</div>
			<div>
				<input type="hidden" name="firstname" value="<?= $_SESSION['firstname']; ?>" /> <!-- hidden input for session firstname -->
			</div>
			<div>
				<input type="hidden" name="surname" value="<?= $_SESSION['surname']; ?>" /> <!-- hidden input for session firstname -->
			</div>			
		</div>
		<div id="section">
			<div id="field5" class="field">
				<label for="destination_from">Depart from:</label></br>
					<select class="form-control" id="destination_from" name="destination_from" />
						<option value="" <?php if( $des_from == '' ){ print('selected'); };?>>-- Select a Destination --</option>
						<!-- print if disabled select a destination option is selected -->
						<option value="Morar" <?php if( $des_from == 'Morar' ){ print('selected'); };?>>Morar</option>
						<!-- print if Morar is selected -->
						<option value="Island of Eigg" <?php if( $des_from == 'Island of Eigg' ){ print('selected'); };?>>Island of Eigg</option>
						<!-- print if Island of Eigg option is selected -->
						<option value="Island of Muck" <?php if( $des_from == 'Island of Muck' ){ print('selected'); };?>>Island of Muck</option>
						<!-- print if Island of Muck option is selected -->
						<option value="Island of Rum" <?php if( $des_from == 'Island of Rum' ){ print('selected'); };?>>Island of Rum</option>
						<!-- print if Island of Rum option is selected -->
					</select>
			</div>		
			<div id="field7" class="field">
				<label for="destination_to">To:</label></br>
					<select class="form-control" id="destination_to" name="destination_to" />
						<option value="" <?php if( $des_to == '' ){ print('selected'); };?>>-- Select a Destination --</option>
						<!-- print if disabled select a destination option is selected -->
						<option value="Morar" <?php if( $des_to == 'Morar' ){ print('selected'); };?>>Morar</option>
						<option value="Island of Eigg" <?php if( $des_to == 'Island of Eigg' ){ print('selected'); };?>>Island of Eigg</option>
						<!-- print if Morar is selected -->
						<option value="Island of Muck" <?php if( $des_to == 'Island of Muck' ){ print('selected'); };?>>Island of Muck</option>
						<!-- print if Island of Muck option is selected -->
						<option value="Island of Rum" <?php if( $des_to == 'Island of Rum' ){ print('selected'); };?>>Island of Rum</option>
						<!-- print if Island of Rum option is selected -->						
				</select>
			</div>
		</div>
		<div id="section">
			<div id="field5" class="field">
				<label for="date_from">Day and Date of departure:</label></br>
				<input type="text" id="depart_datepicker" name="day_and_date_from" placeholder="-- Select a Day and Date --" 
				value="<?php print($date_from);?>" required/>
				<!-- print depart_datepicker value -->
			</div>			
			<div id="field5" class="field">
				<label for="return_date">Day and Date of return:</label></br>
				<input type="text" id="return_datepicker" name="return_day_and_date" placeholder="-- Select a Day and Date --" 
				value="<?php print($date_to);?>" required/>
				<!-- print return_datepicker value -->
			</div>		
		</div>
		<div id="section">
			<div id="field8" class="field">
				How many tickets would you like to buy?
			</div>		
			<div id="field8" class="field">
					<select id="adult_fare_no" name="adult_fare_no" required />
						<option value="" <?php if( $fare_1 == '' ){ print('selected'); };?>>0</option>
						<!-- print if disabled no value tickets is selected -->
						<option value="1" <?php if( $fare_1 == '1' ){ print('selected'); };?>>1</option>
						<!-- print if 1 ticket is selected -->
						<option value="2" <?php if( $fare_1 == '2' ){ print('selected'); };?>>2</option>
						<!-- print if 2 tickets are selected -->
						<option value="3" <?php if( $fare_1 == '3' ){ print('selected'); };?>>3</option>
						<!-- print if 3 tickets are selected -->
						<option value="4" <?php if( $fare_1 == '4' ){ print('selected'); };?>>4</option>
						<!-- print if 4 tickets are selected -->
						<option value="5" <?php if( $fare_1 == '5' ){ print('selected'); };?>>5</option>
						<!-- print if 5 tickets are selected -->						
					</select> Adult Tickets
			</div>
			<div id="field8" class="field">
					<select id="elvn_sxtn_fare_no" name="elvn_sxtn_fare_no">
						<option value="" <?php if( $fare_2 == '' ){ print('selected'); };?>>0</option>
						<!-- print if disabled no value tickets is selected -->
						<option value="1" <?php if( $fare_2 == '1' ){ print('selected'); };?>>1</option>
						<!-- print if 1 ticket is selected -->
						<option value="2" <?php if( $fare_2 == '2' ){ print('selected'); };?>>2</option>
						<!-- print if 2 tickets are selected -->
						<option value="3" <?php if( $fare_2 == '3' ){ print('selected'); };?>>3</option>
						<!-- print if 3 tickets are selected -->
						<option value="4" <?php if( $fare_2 == '4' ){ print('selected'); };?>>4</option>
						<!-- print if 4 tickets are selected -->
						<option value="5" <?php if( $fare_2 == '5' ){ print('selected'); };?>>5</option>
						<!-- print if 5 tickets are selected -->						
					</select> Children (11 - 16 Years Old) Tickets
			</div>
			<div id="field8" class="field">
					<select id="three_ten_fare_no" name="three_ten_fare_no">
						<option value="" <?php if( $fare_3 == '' ){ print('selected'); };?>>0</option>
						<!-- print if disabled no value tickets is selected -->
						<option value="1" <?php if( $fare_3 == '1' ){ print('selected'); };?>>1</option>
						<!-- print if 1 ticket is selected -->
						<option value="2" <?php if( $fare_3 == '2' ){ print('selected'); };?>>2</option>
						<!-- print if 2 tickets are selected -->
						<option value="3" <?php if( $fare_3 == '3' ){ print('selected'); };?>>3</option>
						<!-- print if 3 tickets are selected -->
						<option value="4" <?php if( $fare_3 == '4' ){ print('selected'); };?>>4</option>
						<!-- print if 4 tickets are selected -->
						<option value="5" <?php if( $fare_3 == '5' ){ print('selected'); };?>>5</option>
						<!-- print if 5 tickets are selected -->						
					</select> Children (3 - 10 Years Old) Tickets
			</div>
			<div id="field8" class="field">
					<select id="two_under_fare_no" name="two_under_fare_no">
						<option value="" <?php if( $fare_4 == '' ){ print('selected'); };?>>0</option>
						<!-- print if disabled no value tickets is selected -->
						<option value="1" <?php if( $fare_4 == '1' ){ print('selected'); };?>>1</option>
						<!-- print if 1 ticket is selected -->
						<option value="2" <?php if( $fare_4 == '2' ){ print('selected'); };?>>2</option>
						<!-- print if 2 tickets are selected -->
						<option value="3" <?php if( $fare_4 == '3' ){ print('selected'); };?>>3</option>
						<!-- print if 3 tickets are selected -->
						<option value="4" <?php if( $fare_4 == '4' ){ print('selected'); };?>>4</option>
						<!-- print if 4 tickets are selected -->
						<option value="5" <?php if( $fare_4 == '5' ){ print('selected'); };?>>5</option>				
						<!-- print if 5 tickets are selected -->
					</select> Children (2 Years Or Under) Tickets
			</div>			
		</div>
		<div id="section">
			<div class="field">
				<input type="submit" id="edit_booking" value="Edit Booking">
			</div>
		</div>		
	</form>
</div>

</body>
</html>