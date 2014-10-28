<?php

session_start(); 
error_reporting(0); 
$sessionState = 0;


$passwordFile = fopen("password.php","r");
while(!feof($passwordFile))
   {
   $passwordHash = fgets($passwordFile,1024);
   }
fclose($passwordFile);

if(!isset($_SESSION['userName']) and !isset($_GET['page'])) {
$sessionState = 0;
}

if($_GET['page'] == "log") {
$userInputPassword = $_POST['passwordInput'];
$userInputPasswordHash = md5(md5(md5($userInputPassword))); 
$userName = $_POST['userNameInput'];

if($userInputPasswordHash == $passwordHash) { 
$_SESSION['userName'] = $userName;
$sessionState = 1; // Control to one
} else {
$sessionState = 2;  // Else the user typed the wrong password. (HACKER?!)
}
}

if($_SESSION['userName'] != "") {
$sessionState = 1;
}
?>
<html>
  <head>
    <title>SmartControl</title>
    <link rel="stylesheet" href="resources/style.css">
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="ie.css" />
<![endif]-->
	<link rel="icon"
          type="image/png"
          href="resources/favicon.ico">
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
if($sessionState == 0){
?>
<div id="main">
<div id="cont">
Bitte gib dein Passwort ein: <br /><br />
<form method="post" action="index.php?page=log">
<input type="text" name="userNameInput" placeholder="Nutzername" style="border: none; background: black; color: white; font-family: cambria; height: 30px; font-size: 24px; max-width: 95%;"><br />
<input type="password" name="passwordInput" placeholder="Passwort" style="border: none; background: black; color: white; font-family: cambria; height: 30px; font-size: 24px; max-width: 95%; margin-top: 5px;"><br /><br />
<input type="submit" value="Login" style="background: black; color: white; border:none; font-family: trench; font-size: 28px; padding: 5px;">
</form>
</div>
</div>
<?php
}
if($sessionState == 1) {
?>
<meta http-equiv="refresh" content="0; URL=remote.php" />
<?php 
}
if($sessionState == 2) {
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
