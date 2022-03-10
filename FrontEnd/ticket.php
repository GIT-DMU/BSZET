<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<link rel="stylesheet" href="../style.css" media="screen" />
<html>
<body border="0">

<?php
$host = "127.0.0.1";
$user = "SQL-Admin"; 																		// DB-User
$password = "9b9GCVhtBxPQtp6mv2yy"; 														// DB-User-Password
$dbname = "DB_Doubtful_Joy_SE"; 															//DB-Name

$con = mysqli_connect($host, $user, $password, $dbname);

if (!$con) 
{																				// Check connection
  die("Connection failed: " . mysqli_connect_error());										// Wenn Fehler, anzeigen des Fehlers
}

?>

<table border="1" align="center" class="container">
<tr>
  <td>ID</td>
  <td>Betreff</td>
  <td>Kunde</td>
  <td>Bearbeiter</td>
  <td>Problem</td>
  <td>Status</td>
</tr>
<?php

$query = mysqli_query($con, "SELECT * FROM `tickets`")
   or die (mysqli_error($dbconnect));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['ID']}</td>
    <td>{$row['BETREFF']}</td>
    <td>{$row['KUNDE']}</td>
    <td>{$row['BEARBEITER']}</td>
    <td>{$row['PROBLEM']}</td>
    <td>{$row['STATUS']}</td>
   </tr>\n";

}

if(isset($_POST['Betreff'],$_POST['Kunde'],$_POST['Bearbeiter'],$_POST['Problem'])) 																	// Wenn Input-Ticket gesetzt..
{

    $Betreff = $_POST['Betreff']; 																
    $Kunde = $_POST['Kunde'];	
    $Bearbeiter = $_POST['Bearbeiter'];
    $Problem = $_POST['Problem'];														    
    
    if ($Betreff != "" && $Kunde != "" && $Bearbeiter != "" && $Problem != "")                //Wenn Eingabefelder nicht leer...
    {													

      $query = "INSERT INTO Tickets	(	BETREFF,KUNDE,BEARBEITER, Problem,STATUS)
                          VALUES		(	'$Betreff',	'$Kunde',	'$Bearbeiter','$Problem', '1')";

      $retval = mysqli_query($con, $query);

      if(!$retval)
      {
          die("<br>User konnte nicht erstellt werden: ".mysqli_error());
      }
       

    } else																				//Wenn Input leer.
    {										
      header('Location: ticket.php');							//Zurück zur Übersicht
                                      
    }

}
?>
</table>
</body>

<div class="container">																												<!-- Erstellen div und hinzufügen zur Klasse Container -->
	
		<form action="" method="POST">																				<!-- Erstellen form + setzen des "action"-Attributes, zum senden der Daten an "login_submit.php" + setzen des "method"-Attributes, zum festlegen der Übertragung -->
			<h1>Tickets erstellen</h1>																										<!-- Setzen Header -->
			<input id="Betreff" name="Betreff" placeholder="Betreff"></input>															<!-- Erstellen einer input-box zur eingabe des Benutzernamens -->
			<br><br>																						
			<input id="Kunde" name="Kunde" placeholder="Kunde"></input> 									<!-- Erstellen einer input-box zur eingabe des Passwortes + setzen der Eigenschaft "type="password"" zur Zensur bei der Eingabe -->
			<br><br>
      <input id="Bearbeiter" name="Bearbeiter" placeholder="Bearbeiter"></input>															<!-- Erstellen einer input-box zur eingabe des Benutzernamens -->
			<br><br>
      <input id="Problem" name="Problem" placeholder="Problem"></input>															<!-- Erstellen einer input-box zur eingabe des Benutzernamens -->
			<br><br>
      
			<button class="block">Absenden</button>																					<!-- Erstellen Login-Knopf -->
		</form>
</div>
</html>