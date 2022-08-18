<?php include_once('include.php');
$sql="SELECT * FROM user";
$res=$mysqli->query($sql);
$row = $res->fetch_assoc();
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script>
function headerFunction() { // function for responsive top head
    var x = document.getElementById("myMenu");
    if (x.className === "menu") {
        x.className += " responsive";
    } else {
        x.className = "menu";
    }
}
</script>

<link rel="stylesheet" href="style.css"/>

</head>

<body>

	<div class="header">
		<img class="header_image" src="./images/logo.png" height="150" />
			<?php
				$sp='&nbsp;|&nbsp;';
				if(isset($_SESSION['user_id'])){ // text that comes up when session is active
					print('<font class="userlogin">Welcome '.$_SESSION['firstname']); // welcome with session name if active
					print('<br/><a href="edit_account_form.php">Edit Account</a>'.$sp.
					'<a href="my_bookings.php">My Bookings</a>'.$sp.'<a href="logout.php">Logout</a></font>');
				}else{
					print('<font class="userlogin">Welcome</br>');	 // text that comes up when session is NOT active
					print('<a href="login_page.php">Login</a>'.$sp.'<a href="create_account_form.php">Create Account</a></font>');
				}
			?>
	</div>
	
	<div class="menu" id="myMenu">
		<a href="javascript:void(0);" class="icon" onclick="headerFunction()">&#9776;</a> <!-- Option box that comes into play if responsive -->
		<a class="option1" href="index.php" accesskey="1">Home Page</a> <!-- index page option (accesskey 1) -->
		<a class="option2" href="booking.php" accesskey="2">Booking Page</a> <!-- booking page option (accesskey 2) -->
		<a class="option3" href="user_reviews.php" accesskey="3">User Reviews</a> <!-- user reviews page option (accesskey 3) -->
		<a class="option4" href="contact.php" accesskey="4">Contact Information</a>	<!-- contact page option (accesskey 4) -->
		<a class="option5" href="news.php" accesskey="5">News</a> <!-- news page option (accesskey 5) -->
	</div>
	
</body>
</html>