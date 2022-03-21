<?php
// Starten oder Weiterführen einer Session 
session_start();

// Wenn nicht eingeloggt
if(!isset($_SESSION['UserID'])) 			
{
	// Fehlermeldung
	echo "Es wurde noch keine Sitzung mit diesem User gestartet";
	// Sitzung zerstören
	session_destroy();
	// Umleitung des Users zum Login
	header('Location:../Login/index.php');
}
?>
	<link rel="stylesheet" href="../style.css" media="screen" />												<!-- Importieren der CSS-Datei -->
	<div class="container">																						<!-- Erstellen div und hinzufügen zur Klasse Container -->

		<form action="wg_auswahl.php" method="POST">															<!-- Erstellen form + setzen des "action"-Attributes, zum senden der Daten an "wg_auswahl.php" + setzen des "method"-Attributes, zum festlegen der Übertragung -->
		
			<button class="block" type="submit" name="Button" value="Ticket" >Ticket</button>					<!-- Erstellen Ticket-Knopf -->
			<br><br>																						
			<button type="submit" name="Button" value="Index" class="block">Index</button>						<!-- Erstellen Index-Knopf -->
			<br><br>
			<button type="submit" name="Button" value="Logout" class="block">Index</button>						<!-- Erstellen Logout-Knopf -->
		</form>


	</div>



