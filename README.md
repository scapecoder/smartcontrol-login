SmartControl Webinterface mit Loginfunktion!
=========================

Dieses Projekt ist ein alternatives Webinterface, welches das Webinterface von xkonni im Projekt raspberry-remote ersetzt.
Zudem ist bei diesem ein Passwortschutz mitgeliefert, der in der config.php folgendermaßen eingeschaltet wird:
```php
$uselogin = "true";
```

Als nächstes das Passwort ändern, indem man einen MD5-Hash (Den man z.B. hier generieren kann: http://www.md5hashgenerator.com/) in die password.php Datei einträgt.
Standart Passwort ist: matteo

Wenn man sich einloggen möchte, kann man einen beliebigen Nutzernamen eingeben, der dient nur zu optischen Zwecken!