<?php
session_start();
?><html>
<head>
<title>SWG:Source | Login</title>
<meta name = "viewport" content = "width = device-width">
<meta name = "viewport" content = "initial-scale = 1.0">
</head>
<body>
<center><img src="images/swgsource.png" alt="" width=200/></center>
<form method="post" action="post_login.php">
  <center><p>Username: <input name="username" type="text"></p>
<p>Password: <input name="password" type="password"></p>
<input name="submit" type="submit" value="Submit"></center>
</form>
</body>
</html>
