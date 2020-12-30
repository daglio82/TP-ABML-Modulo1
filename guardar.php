<?php

include('db.php');

if (isset($_POST['guardar'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $grupo_familair = $_POST['grupo_familair'];
  $query = "INSERT INTO socio(nombre, apellido, direccion, telefono, grupo_familair) VALUES ('$nombre', '$apellido', '$direccion', '$telefono', '$grupo_familair')";
  $result = mysqli_query($mysqli, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Se agrego el socio correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
