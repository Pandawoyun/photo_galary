<?php
require_once("../includes/functions.php");
require_once("../includes/database.php");
require_once("../includes/user.php");


$users = User::find_all();

foreach($users as $user){
	echo "User: " . $user->username. "<br/>";
}

$database->close_connection();


/*
echo $database->escape_value("it's working<br />");

$sql = "SELECT * FROM users WHERE id = 1";
$result_set = $database->query($sql);
$found_user = $database->fetch_array($result_set);
echo $found_user['username'];

*/




?>