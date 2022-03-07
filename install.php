<?php
// Zugriff auf Datenbank 
    // Variablen
    $hostname = "192.168.248.10";
    $username = "SQL-Admin";
    $password = "9b9GCVhtBxPQtp6mv2yy";
    $DB = "DB_Doubtful_Joy_SE";
$DBConnection = mysqli_connect($hostname,$username,$password,$DB);    	// Speichern der Zugangsdaten für die DB auf die Variable DBConnection ( IP-Server, User, Passwort, Name Datenbank )

if($DBConnection->connect_error)											// Abfrage ob Verbindung nicht erfolgreich
{
	die("<br>Verbindung fehlgeschlagen: ". $DBConnection->connect_error);		// Ausgabe Des Fehlers
}else
{
	echo "<br>Verbindung erfolgreich";											// Ausgabe Verbindung erfolgreich
}

// Erstellen Tabelle USER

// Erstellen des SQL-Statement zum Erstellen der Tabelle und Speichern dieser auf der Variable query
$query = "CREATE TABLE USER													
(
	ID 			INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	USERNAME 	TEXT,
	PASSWORD 	TEXT,
	USERLEVEL 	INT,
	STATUS		BOOL
	
)";		

$retval = mysqli_query($DBConnection, $query);

if(!$retval)
{
    die("<br>Tabelle konnte nicht erstellt werden: ".mysqli_error());
}
echo "<br>Tabelle wurde erstellt!";
// Erstellen Admin User

$password = 'Password';
$hash = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO USER	(	USERNAME,	PASSWORD,	USERLEVEL,	STATUS)
				VALUES		(	'Admin',	'$hash',	'0',		'1')";

$retval = mysqli_query($DBConnection, $query);

if(!$retval)
{
    die("<br>User konnte nicht erstellt werden: ".mysqli_error());
}
echo "<br>User wurde erstellt!";
?>