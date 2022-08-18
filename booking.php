<?php include_once('include.php');
$sql="SELECT * FROM user";
$res=$mysqli->query($sql);
$row = $res->fetch_assoc();
?>
<html>
<title>Booking Page</title>
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

function loginPage() { // Javascript function where an alert box appears if session is not active
		alert('You have to login or create an account in order to make a booking!')
			window.location='login_page.php';
};

</script>

<link rel="stylesheet" href="style.css"/>

</head>

<body  <?php if(!isset($_SESSION['user_id'])){?> onload="loginPage();" <?php } else {}?>> <!-- Onload function where session is not active -->
<!-- then alert box appears -->
<?php
	// include the top head file
	include('top_head.php');
?>

<div class="title">
	Booking Page
</div>

<div class="booking">
	<form id="enter_booking_details" action="make_booking.php"  method="POST"> <!-- form for the booking details -->
		<div id="section">
			<div id="field1" class="field">
				Please select a destination you wish to depart return from <!-- Text to prompt user to type in details needed to create booking -->
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
					<select class="form-control" id="destination_from" name="destination_from" /> <!-- select a destination from -->
						<option value="">-- Select a Destination --</option> <!-- Disabled select a destination option -->
						<option value="Morar">Morar</option> <!-- Morar option -->
						<option value="Island of Eigg">Island of Eigg</option> <!-- Island of Eigg option -->
						<option value="Island of Muck">Island of Muck</option> <!-- Island of Muck option -->
						<option value="Island of Rum">Island of Rum</option> <!-- Island of Rum option -->
					</select>
			</div>		
			<div id="field7" class="field">
				<label for="destination_to">To:</label></br>
					<select class="form-control" id="destination_to" name="destination_to" /> <!-- select a destination to -->
						<option value="">-- Select a Destination --</option> <!-- Disabled select a destination option -->
						<option value="Morar">Morar</option> <!-- Morar option -->
						<option value="Island of Eigg">Island of Eigg</option> <!-- Island of Eigg option -->
						<option value="Island of Muck">Island of Muck</option> <!-- Island of Muck option -->
						<option value="Island of Rum">Island of Rum</option> <!-- Island of Rum option -->				
				</select>
			</div>
		</div>
		<div id="section">
			<div id="field5" class="field">
				<label for="date_from">Day and Date of departure:</label></br>
				<input type="text" id="depart_datepicker" name="day_and_date_from" placeholder="-- Select a Day and Date --" required/>
			</div>	<!-- Input for depart datepicker -->
			<div id="field5" class="field">
				<label for="return_date">Day and Date of return:</label></br>
				<input type="text" id="return_datepicker" name="return_day_and_date" placeholder="-- Select a Day and Date --" value="" required/>
			</div>	<!-- Input for return datepicker -->
		</div>
		<div id="section">
			<div id="field8" class="field">
				How many tickets would you like to buy?
			</div>		
			<div id="field8" class="field">
					<select id="adult_fare_no" name="adult_fare_no" required /> <!-- select an adult ticket (required) -->
						<option value="">0</option> <!-- Disabled no ticket option -->
						<option value="1">1</option> <!-- 1 ticket -->
						<option value="2">2</option> <!-- 2 tickets -->
						<option value="3">3</option> <!-- 3 tickets -->
						<option value="4">4</option> <!-- 4 tickets -->
						<option value="5">5</option> <!-- 5 tickets -->				
					</select> Adult Tickets
			</div>
			<div id="field8" class="field">
					<select id="elvn_sxtn_fare_no" name="elvn_sxtn_fare_no"> <!-- select an 11-16 year old ticket (optional) -->
						<option value="">0</option> <!-- No ticket option -->
						<option value="1">1</option> <!-- 1 ticket -->
						<option value="2">2</option> <!-- 2 tickets -->
						<option value="3">3</option> <!-- 3 tickets -->
						<option value="4">4</option> <!-- 4 tickets -->
						<option value="5">5</option> <!-- 5 tickets -->				
					</select> Children (11 - 16 Years Old) Tickets
			</div>
			<div id="field8" class="field">
					<select id="three_ten_fare_no" name="three_ten_fare_no"> <!-- select an 3-10 year old ticket (optional) -->
						<option value="">0</option> <!-- No ticket option -->
						<option value="1">1</option> <!-- 1 ticket -->
						<option value="2">2</option> <!-- 2 tickets -->
						<option value="3">3</option> <!-- 3 tickets -->
						<option value="4">4</option> <!-- 4 tickets -->
						<option value="5">5</option> <!-- 5 tickets -->				
					</select> Children (3 - 10 Years Old) Tickets
			</div>
			<div id="field8" class="field">
					<select id="two_under_fare_no" name="two_under_fare_no">  <!-- select an 2 years old or under ticket (optional) -->
						<option value="">0</option> <!-- No ticket option -->
						<option value="1">1</option> <!-- 1 ticket -->
						<option value="2">2</option> <!-- 2 tickets -->
						<option value="3">3</option> <!-- 3 tickets -->
						<option value="4">4</option> <!-- 4 tickets -->
						<option value="5">5</option> <!-- 5 tickets -->			
					</select> Children (2 Years Or Under) Tickets
			</div>			
		</div>
		<div id="section" class="hidden">
			<input type="hidden" name="booking_date" value="<?php echo date('l, d/m/Y'); ?>" /> <!-- hidden input for current date -->
		</div>
		<div id="section">
			<div class="field">
				<input type="submit" id="booking" name="booking" value="Make Booking"> <!-- Submit form button -->
			</div>
		</div>		
	</form>
</div>

</body>
</html>