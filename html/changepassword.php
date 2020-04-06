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
	<style>
	div.container {
    width: 90%;
    border: none;
}

header, footer {
    padding: 1em;
    color: white;
    background-color: none;
    clear: left;
    text-align: center;
}

nav {
    float: left;
    max-width: 160px;
    margin: 0;
    padding: 1em;
}

nav ul {
    list-style-type: none;
    padding: 0;
}
   
nav ul a {
    text-decoration: none;
}

article {
    margin-left: 170px;
    border-left: none;
    padding: 1em;
    overflow: hidden;
}
body  {
    background-color: black;
    background-image: url("/images/grevious.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
}
a:link {
    color: green;
    background-color: transparent;
    text-decoration: none;
}
a:visited {
    color: orange;
    background-color: transparent;
    text-decoration: none;
}
a:hover {
    color: red;
    background-color: transparent;
    text-decoration: underline;
}
a:active {
    color: yellow;
    background-color: transparent;
    text-decoration: underline;
}    
</style>
	<center>
		<body>
		<form action='post_changepassword.php' method='post' border='0'>
		<table>
			<tr>
				<td><b><p style="color:white;">Username</p></b></td>
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
			<td><b><p style="color:white;">New Password</p></b></td>
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
	</center>
</html>
