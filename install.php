<?php
// Zugriff auf Datenbank 
    // Variablen
    $hostname = "192.168.13.10";
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
$query = "CREATE TABLE USER
(
	ID			INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	USERNAME	TEXT,
	PASSWORD	TEXT,
	USERLEVEL	INT,
	STATUS		BOOL
)";

$retval = mysqli_query($DBConnection, $query);

if(!$retval)
{
    die("<br>Tabelle konnte nicht erstellt werden: ".mysqli_error());
}
echo "<br>Tabelle wurde erstellt!";
// Erstellen USER-Admin
$ADM_PWD = "Password";
$Hash = password_hash($ADM_PWD,PASSWORD_DEFAULT);
$query = "INSERT INTO USER	(	USERNAME,PASSWORD,USERLEVEL,STATUS)
				VALUES		(	'Admin',	'$Hash',	'0', '1')";

$retval = mysqli_query($DBConnection, $query);

if(!$retval)
{
    die("<br>User konnte nicht erstellt werden: ".mysqli_error());
}
echo "<br>User wurde erstellt!";

// Erstellen Tabelle Tickets
$query = "CREATE TABLE TICKETS
(
	ID			INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	BETREFF		TEXT,
	KUNDE		TEXT,
	BEARBEITER	TEXT,
	PROBLEM		TEXT,
	STATUS		BOOL
)";

$retval = mysqli_query($DBConnection, $query);

if(!$retval)
{
    die("<br>Tabelle konnte nicht erstellt werden: ".mysqli_error());
}
echo "<br>Tabelle wurde erstellt!";

// Erstellen Tickets
$query = "INSERT INTO TICKETS	(	BETREFF,KUNDE,BEARBEITER, Problem,STATUS)
					VALUES		(	'Netzerkcrash',	'FrankiTents GmbH',	'Dispatcher-01','LAN am PC-12-39 hat täglich Fehler!', '1')";

$retval = mysqli_query($DBConnection, $query);

if(!$retval)
{
    die("<br>User konnte nicht erstellt werden: ".mysqli_error());
}
echo "<br>Ticket wurde erstellt!";
?>