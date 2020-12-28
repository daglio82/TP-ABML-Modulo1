<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM socio WHERE idsocio = $id";
  $result = mysqli_query($mysqli, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'El socio se eliminó correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
