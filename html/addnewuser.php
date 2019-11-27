<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Create a New Account</title>
<meta name = "viewport" content = "width = device-width">
<meta name = "viewport" content = "initial-scale = 1.0">
<script type="text/javascript" language="JavaScript">
<!--

function BothFieldsIdenticalCaseSensitive() {
var one = document.NewUser.realpassword.value;
var another = document.NewUser.confirmpassword.value;
if(one == another) { return true; }
alert("Password fields must be the same.");
return false;
}
//-->
</script>
<style>
body  {
    background-image: url("/images/vaderdeathstar.jpg");
    background-color: black;
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

</head>
<body>
<body style="font-family: arial; font-style: gill-sans">
<p><center><b><a href="/index.php">Home</a></b></p>
<table>
<form name="NewUser" action="newuserpost.php" method="post" border="0">
<p><b><u><center><Font Color="white">REGISTER AN ACCOUNT</Font></p></center></b></u>
<tr>
	<td><Font Color="#FFFFFF"><b>Account Name</b></Font></td>
	<td><input type="text" name="useraccountname"/></td>
</tr><tr>
	<td><Font Color="#FFFFFF"><b>Password</b></Font></td>
    <td><input type="password" name="realpassword"/></td>
</tr><tr>
	<td><Font Color="#FFFFFF"><b>Confirm Password</b></Font></td>
    <td><input type="password" name="confirmpassword"/></td>
</tr><tr>
	<td><Font Color="#FFFFFF"><b>Access Level</b></Font></td>
    <td><select name="accesslevel">
	    <option value="standard">Standard</option>
    </select></td>
</tr>
<tr><td></td><td>
	<input type="hidden" name="action" value="create"/>
	<input type="submit" onclick="return BothFieldsIdenticalCaseSensitive();" value="Submit"/>
</td></tr>
</center>
</form>
</table>
<br />
<center><a href="#" download><font size="+2"><b><u>>>Download Client<<</u></b></font></a></center>
</body>
</html>
