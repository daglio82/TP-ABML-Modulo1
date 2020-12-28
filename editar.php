<?php
include("db.php");
$nombre = '';
$apellido= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM socio WHERE idsocio=$id";
  $result = mysqli_query($mysqli, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
  }
}

if (isset($_POST['Actualizar'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $apellido = $_POST['apellido'];

  $query = "UPDATE socio set nombre = '$nombre', apellido = '$apellido' WHERE idsocio=$id";
  mysqli_query($mysqli, $query);
  $_SESSION['message'] = 'Se actualizó Correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Actualizar Nombre">
        </div>
        <div class="form-group">
          <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="Acctualizar Apellido">
        </div>
        <button class="btn  btn-success" name="Actualizar">
          Actualizar
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
<!-- <textarea name="apellido" class="form-control" cols="10" rows="10"><?php echo $apellido;?></textarea> -->
<!--  -->
