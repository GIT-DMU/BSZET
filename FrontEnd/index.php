<?php

session_start();							// Starten oder Weiterführen einer Session 

if(!isset($_SESSION['UserID'])) 			// Wenn nicht eingeloggt
{
	echo "Nice try ... logg dich ein ^^";
	session_destroy();
	echo ("<meta http-equiv='refresh' content='3; url=../login.php'>");
}
{
	?>
	<link rel="stylesheet" href="../style.css" media="screen" />
	<div class="container">

		<form action="wg_auswahl.php" method="POST">
		
			<button class="block" type="submit" name="Button" value="Ticket" >Ticket</button>
			<br><br>
			<button type="submit" name="Button" value="Index" class="block">Index</button>
			<br><br>
			<button type="submit" name="Button" value="Logout" class="block">Index</button>
		</form>


	</div>
	<?php
}

?>



