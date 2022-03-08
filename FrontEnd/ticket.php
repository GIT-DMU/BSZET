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

if(isset($_POST['Betreff','Kunde','Bearbeiter','Problem'])) 																	// Wenn Input-Ticket gesetzt..
{

    $Betreff = $_POST['Betreff']; 																
    $Kunde = $_POST['Kunde'];	
    $Bearbeiter = $_POST['Bearbeiter'];
    $Problem = $_POST['Problem'];														    
    
    if ($Betreff != "" && $Kunde != "" && $Bearbeiter != "" && $Problem != "")                //Wenn Eingabefelder nicht leer...
    {													

        $sql_query = "Select * FROM `tickets` WHERE KUNDE='".$Kunde."'";				//Query Select * , wenn Daten zu Kunde vorhanden existiert
        $result = mysqli_query($con,$sql_query);                                //Speichern der Query in result
        $row = mysqli_fetch_array($result);                                     //Speichern der Inhalte der Spalten in row
        								                                                        //Erstellen PW_verify_hash für Passwort
        if($row > 0)                                                            //Wenn User existiert..
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
          header('Location: ticket.php');												//Zurück zum Login
                                          
        }

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