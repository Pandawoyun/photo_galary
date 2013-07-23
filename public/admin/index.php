<?php
require_once("../../includes/functions.php");

require_once("../../includes/session.php");


if(!$session->is_logged_in()){
	redirect_to("login.php");
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>Photo Gallery</title>
</head>
<body>
	<div id="header">
		<h1>Photo Gallery</h1>
	</div>
	<div id="main">
		<h2>Menu</h2>
	</div>
</body>
</html>






