<html>
<head>
	<title>Hashgenerator</title>
	<meta charset="UTF-8">
	<style>
	@font-face { font-family: trench; src: url(trench100free.otf); }
	@font-face { font-family: ostrich; src: url(ostrich.ttf); }
	html, body { margin:90px; font-family: trench;  font-size: 24px; font-weight: bold;}
	h1 { font-family: ostrich; font-size: 46px;}
	</style>
</head>
<body>
<?php
error_reporting(0);
$userInput = $_POST['userInput'];
$md5Password = md5(md5(md5($userInput)));

if($userInput == "") {
?>
<h1>Hashgenerator</h1>
Hier kannst du deinen Passworthash erstellen. Tippe hier dein Passwort ein, mit dem zu dich sp&auml;ter einloggen willst: <br /><br />
<form method="POST" action="passwordgen.php">
<input type="password" name="userInput" />
<input type="submit" value="Erstellen" />
</form>
<br />
<br />
<br />
<br />
<h1>Wie funktioniert es?</h1>
Wen's interessiert: Das Passwort wird 3 mal mit md5 verschl&uuml;sselt, sodass das knacken unm&ouml;glich gemacht wird.<br />
Das Passwort "banane" wird bei Datenbanken wie <a href="http://www.md5online.org/" target="_blank">http://www.md5online.org/</a> sofort erkannt, das Passwort "banane" mit dieser Methode<br />
verschl&uumlsselt, wird nicht erkannt, auch nicht bei anderen Datenbanken. Wem das trotzdem nicht genug ist, der kann es auch 5mal <br />
verschl&uumlsseln lassen.<br /><br />
Normaler MD5-Hash: 5473e3f141e0328ce87dac9366e0aace<br />
3-fach MD5 Methode: d44b6438f6f90faeefe32e931c6b9329 <br /><br />

<?php
} else {
echo "Dein Passwort Hash ist: <br /><br />";
echo $md5Password;
echo "<br /><br />";
echo "Jetzt musst du diesen Hash nur noch in die password.php einf&uuml;gen, danach kannst du dich mit dem Passwort '<font color='red'>" . $userInput . "</font>' einlogggen!";
}

?>
</body>
</html>