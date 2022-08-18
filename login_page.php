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
	Login
</div>

<div class="login">
	<form id="user_login" action="login.php" method="POST"> <!-- form for logging in -->
	<div id="section">
		<div id="field1" class="field">
			Please enter your email and password to login <!-- Text to prompt user to type in details needed to login -->
		</div>
	</div>	
	<div id="section">
		<div id="field1" class="field">
			<label for="email">Email Address: <font class="mandatory">(Required)</font></label><br> <!-- label for email address -->
			<input type="email" placeholder="-- Enter Your Email Address --" name="email" required /> <!-- input for email address -->
		</div>
		<div id="field1" class="field">
			<label for="password">Password: <font class="mandatory">(Required)</font></label><br> <!-- label for password -->
			<input type="password" placeholder="-- Enter Your Password --" name="password" required /> <!-- input for password -->
		</div>
	</div>
	<div id="section">
		<div id="field1" class="field">
			If you don't have an account, please <a href="create_account_form.php">create an account</a>.
		</div>
	</div>
	<div id="section">
		<div class="field">
			<input type="submit" name="register" value="Login"> <!-- Submit form button to login -->
		</div>
	</div>	
	</form>
</div>

</body>
</html>