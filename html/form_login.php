<?php
session_start();
?><html>
<head>
<title>SWG:Source | Login</title>
<meta name = "viewport" content = "width = device-width">
<meta name = "viewport" content = "initial-scale = 1.0">
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
    background-image: url("/images/mfalcon.jpg");
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
<center><img src="images/swgsource.png" alt="" width=200/></center>
<form method="post" action="post_login.php">
	<center><b><p style="color:white;">Username: <input name="username" type="text"></p></b>
		<b><p style="color:white;">Password: <input name="password" type="password"></p></b>
<input name="submit" type="submit" value="Submit"></center>
</form>
</body>
</html>
