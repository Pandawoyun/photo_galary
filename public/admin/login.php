<?php
require_once("../../includes/functions.php");
require_once("../../includes/user.php");
require_once("../../includes/database.php");
require_once("../../includes/session.php");

$message = "";
if(isset($_POST['Submit'])){
	$password = trim($_POST['password']);
	$username = trim($_POST['username']);

	$found_user = User::authenticate($username,$password);

	if ($found_user) {

		$session->login($found_user);
		
		redirect_to("index.php");
	}else{
		$message = "Username or password incorrect";
	}
}else{
	$username = $password = "";
}




?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>login</title>
</head>
<body>
	<div id="header"></div>
	<div id="main">
		<?php output_message($message); ?>
		<form action="login.php" method="post">
			<table>
			<tr>
				<td>Username:</td>
				<td>
					<input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>" />
				</td>
			</tr>
			<tr>
				<td>password:</td>
				<td>
					<input type="text" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" />
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="Submit" value="loggin" />
				</td>
			</tr>

			</table>
		</form>

	</div>

</body>
</html>
<?php if(isset($database)){
	$database->close_connection();
} ?>