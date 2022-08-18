<?php 
include('include.php');

if(isset($_SESSION['user_id'])){
	if(isset($_POST['edit_account'])){
		if($_POST['edit_account']=="Edit Account"){
			$sql="UPDATE user
			SET
			username = '".$_POST['username']."',
			firstname = '".$_POST['firstname']."',
			surname = '".$_POST['surname']."',
			address = '".$_POST['address']."',
			postcode = '".$_POST['postcode']."',
			tel_no = '".$_POST['tel_no']."',
			email = '".$_POST['email']."',
			password = '".$_POST['password']."'
			WHERE user_id = ".$_SESSION['user_id'];
		if ($mysqli->query($sql) == true) {
			include("login.php");
			exit();
		} else {
				echo "<script>alert('failed!!');</script>";
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		}
			}else{
		}
	}
}
?>