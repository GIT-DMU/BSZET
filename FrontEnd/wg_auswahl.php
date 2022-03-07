<?php
session_start();
$Auswahl = $_POST["Button"];					// Übername der Daten aus dem Formular ( Ticket ) auf eigene Variable

switch($Auswahl)
{
    case "Ticket":
        echo "Ticket";
    break;
    case "Index":
        echo "Index";
    break;
    
}
?>