<?php
include 'includes/db_connect.php';

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
			return $result;
		}
	}
	else {
		return false;
	}
}

function checkhashSSHA($salt, $password) {
	$hash = base64_encode(sha1($password . $salt, true) . $salt);
	return $hash;
}

$username = $mysqli->real_escape_string($_POST['user_name']);
$password = $mysqli->real_escape_string($_POST['user_password']);
$user = getUserByEmailAndPassword($username, $password);
if ($user != false) {
	if($user['accesslevel'] == "banned") {
		$response['message'] = "Account banned";
	} else {
		$response['message'] = "success";
	}
}
else {
	$response['message'] = "Account does not exist or password was incorrect";
}
echo json_encode($response);
?>
