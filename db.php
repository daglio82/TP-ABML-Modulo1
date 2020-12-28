<?php
session_start();
$servername = "localhost";  
$username = "root";
$password = "";
$database = "club_social";
$mysqli = new mysqli($servername, $username, $password, $database);
if ($mysqli->connect_errno) {
      echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  
  
  
  
  
  
//   'localhost',
//   'root',
//   'password = ""',
//   'club_social',

?>
