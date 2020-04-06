<?php
	session_start();
	if(! isset($_SESSION['user'])) {
		$_SESSION['urlredirect'] = basename($_SERVER['PHP_SELF']);
		header("Location: form_login.php");
	}
?>
<html>
	<head>
		<meta name = "viewport" content = "width = device-width, initial-scale = 1, minimum-scale=1, maximum-scale=1, user-scalable=no">
			<title>Change Password</title>
	</head>
	<body>
		<form action='post_changepassword.php' method='post' border='0'>
		<table>
			<tr>
				<td>Username</td>
				<td><select name="username">
<?php
			include 'includes/db_connect.php';
			$usernamesql = "SELECT * FROM user_account ORDER BY user_id";
			$usernameresult = $mysqli->query($usernamesql);
			$usernamejson = array();
			if($usernameresult->num_rows) {
				$ln = 0;
				while($usernamerow=$usernameresult->fetch_assoc()) {
					$usernamejson[] = $usernamerow;
					if(strcasecmp($_SESSION['username'], $usernamejson[$ln]['username']) == 0) {
						echo '					<option value="'.$usernamejson[$ln]['username'].'"';
						echo ' selected="selected"';
						echo '>'.$usernamejson[$ln]['username'].'</option>'.PHP_EOL;
					}
					else if($_SESSION['accesslevel'] == "superadmin") {
						echo '					<option value="'.$usernamejson[$ln]['username'].'"';
						echo '>'.$usernamejson[$ln]['username'].'</option>'.PHP_EOL;
					}
					$ln++;
				}
			} ?>
			</select></td>
		</tr>
		<tr>
			<td>New Password</td>
			<td><input id='realpassword' type='realpassword' name='password' /></td>
		</tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
		<tr>
			<td></td>
			<td>
				<input type='hidden' name='action' value='update' />
				<input type='submit' value='Save' id="save" />
			</td>
		</tr>
		</table>
		</form>
		</body>
</html>
