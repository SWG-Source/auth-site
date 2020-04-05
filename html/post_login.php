<?php
session_start();
include 'includes/db_connect.php';
$username = $mysqli->real_escape_string($_POST['username']);
$password = $mysqli->real_escape_string($_POST['password']);
$user = getUserByEmailAndPassword($username, $password);
if($user == true) {
	if(isset($_SESSION['urlredirect'])) {
		$_SESSION['user'] = $mysqli->real_escape_string($_POST['username']);
		$redirectName = $_SESSION['urlredirect'];
		echo '<script>';
		echo 'window.location.href="'.$redirectName.'"';
		echo '</script>';
	}
	else {
		header("Location: index.php");
		$_SESSION['user'] = $mysqli->real_escape_string($_POST['username']);
	}
}
else {
	echo $mysqli->real_escape_string($_POST['username']), " does not exist or the password was incorrect";
	echo '<p><a href="form_login.php">Log In</a>';
}

function getUserByEmailAndPassword($username, $password) {
	global $mysqli;
	$result = $mysqli->query("SELECT * FROM user_account WHERE username = '$username'") or die(mysql_error());
	$no_of_rows = $result->num_rows;
	if ($no_of_rows > 0) {
		$result = $result->fetch_array();
		$salt = $result['password_salt'];
		$stored_hash = $result['password_hash'];
		$hashtest = checkhashSSHA($salt, $password);
		if ($hashtest == $stored_hash) {
		    $_SESSION['accesslevel'] = $result['accesslevel'];
			$_SESSION['username'] = $mysqli->real_escape_string($_POST['username']);
			return true;
        }
    } else {
        return false;
    }
}
function checkhashSSHA($salt, $password) {
	$hash = base64_encode(sha1($password . $salt, true) . $salt);
	return $hash;
}
?>
