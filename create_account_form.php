<?php include_once('include.php');?>
<html>
<title>Create Account</title>
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
	Create Account
</div>

<div class="register">
	<form id="cust_register" action="create_account.php"  method="POST" onsubmit="regFunction()"> <!-- form for creating account -->
		<div id="section">
			<div id="field1" class="field">
				Please enter the details needed to create an account <!-- Text to prompt user to type in details needed to create account -->
			</div>
		</div>
		<div id="section">
			<div id="field1" class="field">
				<label for="firstname">Firstname(s): <font class="mandatory">(Required)</font></label><br> <!-- label for firstname -->
				<input type="text" placeholder="-- Enter Your Firstname(s) --" name="firstname" required /> <!-- input for firstname -->
			</div>
			<div id="field2" class="field">
				<label for="surname">Surname: <font class="mandatory">(Required)</font></label><br> <!-- label for surname -->
				<input type="text" placeholder="-- Enter Your Surname --" name="surname" required /> <!-- input for surname -->
			</div>
			<div id="field2" class="field">
				<label for="username">Username: <font class="mandatory">(Required)</font></label><br> <!-- label for username -->
				<input type="text" name="username" placeholder="-- Enter a Username --" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
						title="Your password has to have at least one number and one uppercase and lowercase letter, 
						and is at least 8 or more characters required" required /> <!-- input for username -->
			</div>
		</div>
		<div id="section">
			<div id="field1" class="field">
				<label for="address">Address: <font class="mandatory">(Required)</font></label><br> <!-- label for address -->
				<input type="text" placeholder="-- Enter Your Address --" name="address" required /> <!-- input for address -->
			</div>
			<div id="field2" class="field">
				<label for="postcode">Postcode: <font class="mandatory">(Required)</font></label><br> <!-- label for postcode -->
				<input type="text" placeholder="-- Enter Your Postcode --" name="postcode" required /> <!-- input for postcode -->	
			</div>
			<div id="field2" class="field">
				<label for="tel_no">Telephone: <font class="mandatory">(Optional)</font></label><br> <!-- label for telephone (optional) -->
				<input type="tel" placeholder="-- Enter Your Telephone --" name="tel_no" /> <!-- input for telephone (optional) -->
			</div>
		</div>
		<div id="section">
			<div id="field1" class="field">
				<label for="email">Email Address: <font class="mandatory">(Required)</font></label><br> <!-- label for email address -->
				<input type="email" placeholder="-- Enter Your Email Address --" name="email" required /> <!-- input for email address -->
			</div>
			<div id="field4" class="field">
				<label for="password">Password: <font class="mandatory">(Required)</font></label><br> <!-- label for password -->
				<input type="password" placeholder="-- Enter Your Password --" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
						title="Your password has to have at least one number and one uppercase and lowercase letter, 
						and is at least 8 or more characters required" required /> <!-- input for password -->
			</div>
		</div>
		<div id="section">
			<div class="field">
				<input type="submit" name="register" value="Create Account"> <!-- Submit form button to create account -->
			</div>
		</div>
	</form>
</div>
</body>
</html>