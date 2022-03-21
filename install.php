<?php
// Zugriff auf Datenbank 
    // Variablen
    $hostname = "192.168.13.10";
    $username = "SQL-Admin";
    $password = "9b9GCVhtBxPQtp6mv2yy";
    $DB = "DB_Doubtful_Joy_SE";
// Speichern der Zugangsdaten für die DB auf die Variable DBConnection ( IP-Server, User, Passwort, Name Datenbank )
$DBConnection = mysqli_connect($hostname,$username,$password,$DB);    	
// Abfrage ob Verbindung nicht erfolgreich
if($DBConnection->connect_error)											
{
	// Ausgabe Des Fehlers
	die("<br>Verbindung fehlgeschlagen: ". $DBConnection->connect_error);		
}else
{
	// Ausgabe Verbindung erfolgreich
	echo "<br>Verbindung erfolgreich";											
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
// Ausführen der Query
$retval = mysqli_query($DBConnection, $query);
// Abfrage ob nicht erfolgreich
if(!$retval)
{
	// Ausgabe des Fehlers
    die("<br>Tabelle konnte nicht erstellt werden: ".mysqli_error());	
}
// Ausgabe Erfolgreich
echo "<br>Tabelle wurde erstellt!";

// Erstellen USER-Admin
$ADM_PWD = "Password";
// Umwandeln des Passwortest von Klartext in Hashwert
$Hash = password_hash($ADM_PWD,PASSWORD_DEFAULT);
// Erstellen des Users Admin
$query = "INSERT INTO USER	(	USERNAME,PASSWORD,USERLEVEL,STATUS)
				VALUES		(	'Admin',	'$Hash',	'0', '1')";
// Ausführen der Query
$retval = mysqli_query($DBConnection, $query);
// Abfrage ob nicht erfolgreich
if(!$retval)
{
	// Ausgabe des Fehlers
    die("<br>User konnte nicht erstellt werden: ".mysqli_error());
}
// Ausgabe erfolgreich
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
// Ausführen der Query
$retval = mysqli_query($DBConnection, $query);
// Abfrage ob nicht erfolgreich
if(!$retval)
{
	// Ausgabe des Fehlers
    die("<br>Tabelle konnte nicht erstellt werden: ".mysqli_error());
}
// Ausgabe wenn erfolgreich
echo "<br>Tabelle wurde erstellt!";

// Erstellen Tickets
$query = "INSERT INTO TICKETS	(	BETREFF,KUNDE,BEARBEITER, Problem,STATUS)
					VALUES		(	'Netzerkcrash',	'FrankiTents GmbH',	'Dispatcher-01','LAN am PC-12-39 hat täglich Fehler!', '1')";
// Ausführen der Query
$retval = mysqli_query($DBConnection, $query);
// Abfrage ob nicht erfolgreich
if(!$retval)
{
	// Ausgabe des Fehlers
    die("<br>User konnte nicht erstellt werden: ".mysqli_error());
}
// Ausgabe wenn erfolgreich
echo "<br>Ticket wurde erstellt!";
?>