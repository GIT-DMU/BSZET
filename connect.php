<?php
session_start();

$host = "192.168.248.10"; /* Host name */
$user = "SQL-Admin"; /* User */
$password = "9b9GCVhtBxPQtp6mv2yy"; /* Password */
$dbname = "DB_Doubtful_Joy_SE"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}