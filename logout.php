<?php
// dispose of the session
include("include.php");
session_unset();
session_destroy();
header('Location: index.php');
?>