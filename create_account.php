<?php 
include('include.php');
// enter insert query for creating an account
$sql="INSERT INTO user
(username,
firstname,
surname,
address,
postcode,
tel_no,
email,
password)

VALUES
(
'".$_POST['username']."',
'".$_POST['firstname']."',
'".$_POST['surname']."',
'".$_POST['address']."',
'".$_POST['postcode']."',
'".$_POST['tel_no']."',
'".$_POST['email']."',
'".$_POST['password']."'
)";

//print($sql);
//exit;

// execute the query
if ($mysqli->query($sql) == true) {	
	// redirect to new page	
	include("login.php");
	exit();
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>