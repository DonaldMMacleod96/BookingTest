<?php include_once('include.php');
$sql="SELECT * FROM user";
$res=$mysqli->query($sql);
$row = $res->fetch_assoc();
?>
<html>
<title>Booking Page</title>
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
	User Reviews
</div>

</body>
</html>