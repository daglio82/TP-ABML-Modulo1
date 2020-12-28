<?php

include('db.php');

if (isset($_POST['guardar'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $query = "INSERT INTO socio(nombre, apellido) VALUES ('$nombre', '$apellido')";
  $result = mysqli_query($mysqli, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Se agrego el socio correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
