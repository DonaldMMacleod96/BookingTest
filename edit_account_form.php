<?php include_once('include.php');
$sql="SELECT * FROM user WHERE user_id='".$_SESSION['user_id']."'";
$res=$mysqli->query($sql);
$row = $res->fetch_assoc();
?>
<html>
<title>Edit Account</title>
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
	Edit Account
</div>

<div class="register">
	<form id="edit_account" action="edit_account.php"  method="POST" onsubmit="regFunction()"> <!-- form for editing account -->
		<div id="section">
			<div id="field1" class="field">
				Please edit any of your details to update your account <!-- Text to prompt user to type in details needed to update account -->
			</div>
		</div>
		<div id="section">
			<div id="field1" class="field">
				<label for="firstname">Firstname(s): <font class="mandatory">(Required)</font></label><br> <!-- label for firstname -->
				<input type="text" placeholder="-- Enter Your Firstname(s) --" name="firstname" 
				value="<?php print($_SESSION['firstname']);?>" required /> <!-- printed value of firstname -->
			</div>
			<div id="field2" class="field">
				<label for="surname">Surname: <font class="mandatory">(Required)</font></label><br><!-- label for surname -->
				<input type="text" placeholder="-- Enter Your Surname --" name="surname"
				value="<?php print($_SESSION['surname']);?>" required /> <!-- printed value of surname -->
			</div>
			<div id="field2" class="field">
				<label for="username">Username: <font class="mandatory">(Required)</font></label><br> <!-- label for username -->
				<input type="text" name="username" placeholder="-- Enter a Username --" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
						title="Your password has to have at least one number and one uppercase and lowercase letter, 
						and is at least 8 or more characters required"
						value="<?php print($_SESSION['username']);?>" required /> <!-- printed value of username -->
			</div>
		</div>
		<div id="section">
			<div id="field1" class="field">
				<label for="address">Address: <font class="mandatory">(Required)</font></label><br> <!-- label for address -->
				<input type="text" placeholder="-- Enter Your Address --" name="address"
				value="<?php print($_SESSION['address']);?>" required /> <!-- printed value of address -->
			</div>
			<div id="field2" class="field">
				<label for="postcode">Postcode: <font class="mandatory">(Required)</font></label><br> <!-- label for postcode -->
				<input type="text" placeholder="-- Enter Your Postcode --" name="postcode"
				value="<?php print($_SESSION['postcode']);?>" required /> <!-- printed value of postcode -->		
			</div>
			<div id="field2" class="field">
				<label for="tel_no">Telephone: <font class="mandatory">(Optional)</font></label><br> <!-- label for telephone (optional) -->
				<input type="tel" placeholder="-- Enter Your Telephone --" name="tel_no" 
				value="<?php print($_SESSION['tel_no']);?>" /> <!-- printed value of telephone -->
			</div>
		</div>
		<div id="section">
			<div id="field1" class="field">
				<label for="email">Email Address: <font class="mandatory">(Required)</font></label><br> <!-- label for email address -->
				<input type="email" placeholder="-- Enter Your Email Address --" name="email"
				value="<?php print($_SESSION['email']);?>" required /> <!-- printed value of email address -->
			</div>
			<div id="field4" class="field">
				<label for="password">Password: <font class="mandatory">(Required)</font></label><br> <!-- label for password -->
				<input type="password" placeholder="-- Enter Your Password --" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
						title="Your password has to have at least one number and one uppercase and lowercase letter, 
						and is at least 8 or more characters required"
						value="<?php print($_SESSION['password']);?>" required /> <!-- printed value of password -->
			</div>
		</div>
		<div id="section">
			<div class="field">
				<input type="submit" name="edit_account" value="Edit Account"> <!-- Submit form button to edit account -->
			</div>
		</div>
	</form>
</div>
</body>
</html>