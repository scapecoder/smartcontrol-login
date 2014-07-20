<?php
// Webinterface by: scapecoder
// Translated by: scapecoder
// This Webinterface is designed for raspberry-remote by xkonni. See more at Github! http://xkonni.github.com/raspberry-remote/
// You can edit everything you want, jeyy!
// Have Fun with out Automated Home System!
session_start(); // Start User Session
error_reporting(0); // Turn off any Error reporting

$whats = 0; // Control Variable


$userdatei = fopen("password.php","r");  // Open password file
while(!feof($userdatei))
   {
   $pw = fgets($userdatei,1024); // Get the password (Up to 1024 Letters)
   }
fclose($userdatei); // Close password file

if(!isset($_SESSION['username']) and !isset($_GET['page'])) { // If A Session isn't already started, and no Page is given,
$whats = 0; // Then turn to Zero
}

if($_GET['page'] == "log") { // If the user submitted the form
$pass = $_POST['pass']; // Get input password
$pass = md5($pass); // Decrypt it. Wow. Like Magic
$user = $_POST['user']; // Get Username (DOESNT MATTER), lol

if($pass == $pw) { // Check password, cause hackers everywhere
$_SESSION['username'] = $user; // set the session to the input user
$whats = 1; // Control to one
} else {
$whats = 2;  // Else the user typed the wrong password. (HACKER?!)
}
}

if($_SESSION['username'] != "") {
$whats = 1;
}
?>
<html>
  <head>
    <title>SmartControl</title>
    <link rel="stylesheet" href="style.css">
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="ie.css" />
<![endif]-->
	<link rel="icon"
          type="image/png"
          href="favicon.ico">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport"
          content="
              height = device-height,
              width = device-width,
              initial-scale = 1.0,
              user-scalable = no ,
              target-densitydpi = device-dpi
              " />
	<meta charset="utf-8">
  </head>
<body>
<div id="header">
SmartControl
</div>
<br />
<?php
if($whats == 0){ // Output for value Zero (Not logged in, no session)
?>
<div id="main">
<div id="cont">
Bitte gib dein Passwort ein: <br /><br />
<form method="post" action="index.php?page=log">
<input type="text" name="user" placeholder="Nutzername" style="border: none; background: black; color: white; font-family: cambria; height: 30px; font-size: 24px; max-width: 95%;"><br />
<input type="password" name="pass" placeholder="Passwort" style="border: none; background: black; color: white; font-family: cambria; height: 30px; font-size: 24px; max-width: 95%; margin-top: 5px;"><br /><br />
<input type="submit" value="Login" style="background: black; color: white; border:none; font-family: trench; font-size: 28px; padding: 5px;">
</form>
</div>
</div>
<?php
}
if($whats == 1) { // is Logged in (Session was set)
?>
<meta http-equiv="refresh" content="0; URL=remote.php" />
<?php 
}
if($whats == 2) { // WRONG PASSWORD, NOOB!
?>
<div id="main">
<div id="cont">
Das eingegebene Passwort ist falsch. Versuch es <a href="index.php" style="color: blue;">hier</a> nochmal.<br />
</div>
</div>
<?php
}
?>
</body>
</html>
