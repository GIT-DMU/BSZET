<link rel="stylesheet" href="../style.css" media="screen" />
<html>
<body border="0">

<?php
$host = "192.168.13.10";                                  // DB-Host
$user = "SQL-Admin"; 																		  // DB-User
$password = "9b9GCVhtBxPQtp6mv2yy"; 										  // DB-User-Password
$dbname = "DB_Doubtful_Joy_SE"; 												  //DB-Name
// Verbindung zur DB
$con = mysqli_connect($host, $user, $password, $dbname);  
// Abfrage ob Fehler bei der Installation
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
$count = mysqli_query($con, "SELECT COUNT(ID) AS CTICKETS FROM TICKETS")
  or die (mysqli_error($con));
while($counter = mysqli_fetch_array($count))
{
  echo "<h2>Anzahl Tickets: {$counter['CTICKETS']}</h1>";
}

  
$query = mysqli_query($con, "SELECT * FROM TICKETS")
   or die (mysqli_error($con));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['ID']}</td>
    <td>{$row['BETREFF']}</td>
    <td>{$row['KUNDE']}</td>
    <td>{$row['BEARBEITER']}</td>
    <td>{$row['PROBLEM']}</td>
    <td>{$row['STATUS']}</td>
   </tr>";

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
      header('Location: ticket.php');	
      if(!$retval)
      {
          die("<br>Ticket konnte nicht erstellt werden!: ".mysqli_error());
      }
       

    } else																				//Wenn Input leer.
    {										
      header('Location: ticket.php');							//Zur??ck zur ??bersicht
                                      
    }

}
?>
</table>
</body>
<div class="container">																												<!-- Erstellen div und hinzuf??gen zur Klasse Container -->
	
		<form action="" method="POST">																				<!-- Erstellen form + setzen des "action"-Attributes, zum senden der Daten an "login_submit.php" + setzen des "method"-Attributes, zum festlegen der ??bertragung -->
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