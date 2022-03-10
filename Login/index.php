<?php

session_start();

$host = "192.168.13.10"; 																	// DB-Host
$user = "SQL-Admin"; 																		// DB-User
$password = "9b9GCVhtBxPQtp6mv2yy"; 														// DB-User-Password
$dbname = "DB_Doubtful_Joy_SE"; 															//DB-Name

$con = mysqli_connect($host, $user, $password, $dbname);

if (!$con) {																				// Check connection
  die("Connection failed: " . mysqli_connect_error());										// Wenn Fehler, anzeigen des Fehlers
}

if(isset($_POST['login'])) 																	// Wenn Input-login gesetzt..
{

    $Login_User = $_POST['login']; 																//Variable Login aus Input-login
    $Login_Password = $_POST['password'];															//Variable Password aus Input-password
    
    if ($Login_User != "" && $Login_Password != ""){													//Wenn Login und Password nicht leer..

        $sql_query = "Select * FROM USER WHERE USERNAME='".$Login_User."' LIMIT 1";				//Query Select * , wenn User existiert
        $result = mysqli_query($con,$sql_query);											//Speichern der Query in result
        $row = mysqli_fetch_array($result);   													//Speichern der Inhalte der Spalten in row
        $PWmatch = password_verify($Login_Password,$row['PASSWORD']);								//Erstellen PW_verify_hash für Passwort
        if($row > 0)																		//Wenn User existiert..
		{
			if($row['PASSWORD'] == $PWmatch)													//Wenn Passwort verifiziert wurde..
			{
				if($row['STATUS'])															//Wenn User-Status aktiv
				{
					$_SESSION['UserID'] = $row['ID'];											//Ändern der Session-ID zu User-ID
            		header('Location:../FrontEnd/index.php');								//Weiterleitung zu Intranet
				}
											
			}
            
        }
		else																				//Wenn User nicht existiert..
		{
            echo "Invalid username and password";											//Fehlermeldung
			header('Location:../index.php');												//Zurück zum Login
			session_destroy();																//Session zerstören
        }

    }

}

?>

<link rel="stylesheet" href="../style.css" media="screen" /> 																		<!-- Importieren der CSS-Datei -->
<div class="container">																												<!-- Erstellen div und hinzufügen zur Klasse Container -->
	
		<form action="" method="POST">																				<!-- Erstellen form + setzen des "action"-Attributes, zum senden der Daten an "login_submit.php" + setzen des "method"-Attributes, zum festlegen der Übertragung -->
			<h1>Intranet</h1>																										<!-- Setzen Header -->
			<input id="login " name="login" placeholder="Benutzername"></input>															<!-- Erstellen einer input-box zur eingabe des Benutzernamens -->
			<br><br>																						
			<input id="password" type="password" name="password" placeholder="Passwort"></input> 									<!-- Erstellen einer input-box zur eingabe des Passwortes + setzen der Eigenschaft "type="password"" zur Zensur bei der Eingabe -->
			<br><br>
			<button class="block">Login</button>																					<!-- Erstellen Login-Knopf -->
		</form>
</div>

