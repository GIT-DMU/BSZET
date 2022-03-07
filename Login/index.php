<link rel="stylesheet" href="../style.css" media="screen" /> 																		<!-- Importieren der CSS-Datei -->
<div class="container">																												<!-- Erstellen div und hinzufügen zur Klasse Container -->
	
		<form action="login_submit.php" method="POST">																				<!-- Erstellen form + setzen des "action"-Attributes, zum senden der Daten an "login_submit.php" + setzen des "method"-Attributes, zum festlegen der Übertragung -->
			<h1>Intranet</h1>																										<!-- Setzen Header -->
			<input id="login " name="login" placeholder="Benutzername"></input>															<!-- Erstellen einer input-box zur eingabe des Benutzernamens -->
			<br><br>																						
			<input id="password" type="password" name="password" placeholder="Passwort"></input> 									<!-- Erstellen einer input-box zur eingabe des Passwortes + setzen der Eigenschaft "type="password"" zur Zensur bei der Eingabe -->
			<br><br>
			<button class="block" id="but_submit">Login</button>																					<!-- Erstellen Login-Knopf -->
		</form>
</div>

