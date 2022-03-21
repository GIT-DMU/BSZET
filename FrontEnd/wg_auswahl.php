<?php
// Weiterfüheren der Session
session_start();
// Übername der Daten aus dem Formular ( Ticket ) auf eigene Variable
$Auswahl = $_POST["Button"];					

// Abfrage der Auswahl aus "index.php"
switch($Auswahl)
{
    // Wenn Auswahl "Ticket"
    case "Ticket":
        // Weiterleitung an Ticketsystem
        header('Location: ticket.php');
    break;
    case "Index":
        echo "Index";
    break;
    
}
?>