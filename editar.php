<?php
include("db.php");
$nombre = '';
$apellido= '';
$direccion= '';
$telefono= '';
$grupo_familair= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM socio WHERE idsocio=$id";
  $result = mysqli_query($mysqli, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $direccion = $row['direccion'];
  $telefono = $row['telefono'];
  $grupo_familair = $row['grupo_familair'];
  }
}

if (isset($_POST['Actualizar'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $grupo_familair = $_POST['grupo_familair'];

  $query = "UPDATE socio set nombre = '$nombre', apellido = '$apellido', direccion = '$direccion', telefono = '$telefono', grupo_familair = '$grupo_familair' WHERE idsocio=$id";
  mysqli_query($mysqli, $query);
  $_SESSION['message'] = 'Se actualizó Correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<h1 align="center"> ACTUALIZAR</h1>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Actualizar Nombre">
        </div>
        <div class="form-group">
          <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="Actualizar Apellido">
        </div>
        <div class="form-group">
          <input name="direccion" type="text" class="form-control" value="<?php echo $direccion; ?>" placeholder="Actualizar Direccion">
        </div>
        <div class="form-group">
          <input name="telefono" type="text" class="form-control" value="<?php echo $telefono; ?>" placeholder="Actualizar Telefono">
        </div>
        <div class="form-group">
          <input name="grupo_familair" type="text" class="form-control" value="<?php echo $grupo_familair; ?>" placeholder="Actualizar Grupo Familiar">
        </div>
        <button class="btn  btn-success" name="Actualizar">
          Actualizar
        </button>
        <input type="button"onclick="location.href='index.php'"class="btn  btn-success" name="cancelar" value="Cancelar" style="float: right">
              
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
<!-- <textarea name="apellido" class="form-control"  rows="1"><?php echo $apellido;?></textarea> -->
<!--  -->
