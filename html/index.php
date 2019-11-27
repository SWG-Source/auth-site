<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>SWG Source Server Main Page</title>
<link rel="stylesheet" type="text/css"href="stylesheet.css">
<meta name="viewport" content="width=device-width">
<meta name="viewport" content="initial-scale=1">
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
    background-image: url("/images/stormtrooper.jpg");
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

<div class="container">

<header>

<nav>
  <ul>
    <li><b><a href="/index.php">Home</a></b></li>
    <li><b><a href="/forums/index.php">Forums</a></b></li><br>
    <p><b><u>Useful Links</u></b></p>
    <li><b><a href="http://www.swgsource.com">SWG Source</a></b></li>
    <li><b><a href="https://discordapp.com/channels/366560008068005892/366560008608940035">SWG Source Discord Server</a></b></li>
    <li><b><a href="#">Stella Bellum</a></b></li>
    <li><b><a href="http://www.swgpets.com">SWG Pets</a></b></li>
    <li><b><a href="http://www.swgcraft.co.uk">SWG Craft</a></b></li>
    <li><b><a href="http://www.galaxyharvester.net">Galaxy Harvester</a></b></li>
    <li><b><a href="http://www.swgjunkyard.com">SWG Junkyard</a></b></li>
    <li><b><a href="http://www.swgtools.com">SWG Tools</a></b></li>
    <li><b><a href="#">SWG City Planner</a></b></li>
    <li><b><a href="#">SWG Activeframe</a></b></li>
  </ul>
</nav>
	
<audio muted autoplay id="myaudio">
  <source src="/music/Star Wars Main Theme.mp3">
</audio>
	
<script>
  var audio = document.getElementById("myaudio");
  audio.volume = 0.3;
</script>
   <center><h1><b>WELCOME</b></h1>
   <p><b>to</b></p>
   <p><b>SWG Source Server v2.2</b></p>
   <p><b>This is the Login frontend for your NGE server</b></p>
   <p><b>Click below to Create a New Account</b></p>
   <p><b><a href="/addnewuser.php"><u>Register an Account</u></a></b></p></center>
</header>
  

<article>
    <p></p>
    <p></p>
    <p></p>
</article>    

<h1><b><font color='#FFFFFF'><u>Server Status</u></font></b></h1>
	<div class="status">
		<div>
		<table>
        <?php
            $server = "127.0.0.1";
            $portg = "44463";
            $portl = "44453";
            $timeout = "5";
            $portm = "3306";
            
            $mysql = @fsockopen("$server", $portm, $errno, $errstr, $timeout);
            $game = @fsockopen("$server", $portg, $errno, $errstr, $timeout);
            $login = @fsockopen("$server", $portl, $errno, $errstr, $timeout);

                echo "<p><center><strong><font color='#FFFFFF'>Login Server: </font></strong>";
                echo $login ? "<font color=\"green\">Online</font>" : "<font color=\"red\">Offline</font></p></center>";
                echo "<p><center><strong><font color='#FFFFFF'>Game Server: </font></strong>";
                echo $game ? "<font color=\"green\">Online</font>" : "<font color=\"red\">Offline</font></p></center>";
        ?>
		</table>
		</div>
	</div>

<center>
<?php
//first you need to define db info
  define('mySQL_hostname', '127.0.0.1');  //database IP
  define('mySQL_database', 'swgusers');  //database name
  define('mySQL_username', 'root');  //database user
  define('mySQL_password', 'swg');  //database password
//connects to mysql
  $db_link = mysql_pconnect( mySQL_hostname, mySQL_username, mySQL_password )
    or die( 'Error connecting to mysql<br><br>'.mysql_error() );
//connects to Database
  $db_select = mysql_select_db( mySQL_database, $db_link )
    or die( 'Error connecting to Database<br><br>'.mysql_error() );
//selects desired table
   $chars= mysql_query("SELECT `online` FROM `characters` where `online`=1");
//tells how much rows are there (will come helpfull with while loops)
   $rows = mysql_num_rows($chars);
    echo "<p><strong><font color='#FFFFFF'> Online Players:</font></strong></p><em>".$rows."<em>"; //prints out the $x number of players online
?>
</center>
</div>
</body>
</html>
