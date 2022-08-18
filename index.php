<?php include_once('include.php');?>
<html>
<title>Home Page</title>
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
	Home Page
</div>

<div class="homepage">
	<?php
		if(isset($_SESSION['user_id'])){
			print('Thank you '.$_SESSION['firstname'].' for being with us, please <a href="booking.php">
			create a booking</a>, or go into <a href="my_bookings.php">my bookings</a> in order to edit or delete a booking!');
			// printed text that comes up if user is logged in or has an account
		}else{
			print('Welcome to Alba Wildlife Cruises! Please <a href="create_account_form.php">create an account</a> or <a href="login_page.php">
			login</a> with us in order to make a booking!');
			// printed text that comes up if user is NOT logged in or registered
		}
	?>
</div>

</body>
</html>