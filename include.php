<?php
// this is my include file .. woohoo!!

// start the session
session_start();

// enable full error reporting
error_reporting(E_ALL);

$myurl="http://comp-server.uhi.ac.uk/~14003763";
$validation="http://comp-server.uhi.ac.uk/~14003763/comment_validation.php";
$blog="http://comp-server.uhi.ac.uk/~14003763/blog.php";

function var_name($var) {
    foreach($GLOBALS as $var_name => $value) {
        if ($value === $var) {
            return $var_name;
        }
    }
    return false;
}

// debug function that will display anything you pass to it
function debug($val){		
	print("<pre>".var_name($val).":  ");
	print_r($val);
	print("</pre><hr>");
}


// connect to the database
// using mysqli("host name", "user name", "password", "database name")
$mysqli = new mysqli("comp-server.uhi.ac.uk", "le14003763", "le14003763", "le14003763");
if ($mysqli->connect_errno) { // check connection
    print("Connect failed: ".$mysqli->connect_error."\n");	
    exit();
}

?>