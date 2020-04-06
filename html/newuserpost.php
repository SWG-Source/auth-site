<?php
session_start();
?>
<html><head>
<meta name = "viewport" content = "width = device-width">
<meta name = "viewport" content = "initial-scale = 1.0">
<?php
$action = isset($_POST['action']) ? $_POST['action'] : "";

if($action=='create') {
    include 'includes/db_connect.php';
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
    $query = "insert into user_account
	set
	username = '".$mysqli->real_escape_string($_POST['useraccountname'])."',
	password_hash = '".$mysqli->real_escape_string($passwordEncrypted)."',
	password_salt = '".$mysqli->real_escape_string($passwordSalt)."',
    accesslevel = 'standard'";

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
