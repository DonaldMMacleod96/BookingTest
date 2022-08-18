<?php
// include once my include file
include_once("include.php");

// create a query for logging in the user
$sql="SELECT COUNT(user_id) AS user_count FROM user
		WHERE	email='".$_POST['email']."'
		AND		password='".$_POST['password']."'";
		// execute the query
	if ($result = $mysqli->query($sql))	{
		$row = $result->fetch_assoc();
		debug($row);
		
		// if query can't find a user count for the existing user
		if($row['user_count']==0){
			// alert comes up saying incorrect login
			print("<script>alert('Incorrect Login!!')</script>");
		} // if the query finds a user count
		else{
			
				// start the session
				$sql="SELECT * FROM user WHERE	email='".$_POST['email']."' AND	password='".$_POST['password']."'";
			if ($result = $mysqli->query($sql))	{
				$row = $result->fetch_assoc();
				$_SESSION=$row;
			} 
			// return to index page
			header('Location: index.php');
		}
		exit();
	}	else{
			echo "<script>alert('failed!!');</script>";
			echo "Error: " . $sql . "<br>" . $mysqli->error;	
	}
	?>