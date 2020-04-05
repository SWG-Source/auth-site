<?php
session_start();
if(! isset($_SESSION['user'])) {
	header("Location: form_login.php"); //if we aren't logged in, redirect to login!
}
?>
<html><head>
<meta name = "viewport" content = "width = device-width">
<meta name = "viewport" content = "initial-scale = 1.0">
<?php
$action = isset($_POST['action']) ? $mysqli->real_escape_string($_POST['action']) : "";
$username = $mysqli->real_escape_string($_POST['username']);
if(strcasecmp($_SESSION['username'], $usernamejson[$ln]['username']) != 0)
{
	//error - trying to update password for someone that isn't ourself
	if($_SESSION['accesslevel'] != "superadmin") {
		//we can continue, we are superadmin
	}
	else
	{
		echo "Error - You can only change your own password.";
		die();
	}
}

if($action=='update') {
    include 'includes/db_connect.php';
    #do password hash here
	function HashPassword($password)
	{
		$random = '';
		$salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
	}
	$passwordHash = HashPassword($_POST['realpassword']);
	$passwordSalt = $passwordHash['salt'];
	$passwordEncrypted = $passwordHash['encrypted'];
    $query = "update user_account
	set
	password_hash = '".$mysqli->real_escape_string($passwordEncrypted)."',
	password_salt = '".$mysqli->real_escape_string($passwordSalt)."'
	WHERE username = '".$mysqli->real_escape_string($username)."'";

    if( $mysqli->query($query) ) {
		echo '<script>';
		echo 'window.location.assign("index.php");';
        echo '</script>';
	}
	else {
		printf($mysqli->error);
	}
	$mysqli->close();
}
?>
</head></html>
