<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<h1 align="center"> LISTA DE SOCIOS </h1>
<h2>  ALTA DE SOCIOS </h2>
          

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAJES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- AGREGAR SOCIO AL FORMULARIO -->
      <div class="card card-body">
        <form action="guardar.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre Socio" autofocus>
          </div>
          <div class="form-group">
            <textarea name="apellido" rows="1" class="form-control" placeholder="Apellido Socio"></textarea>
          </div>
          <div class="form-group">
            <textarea name="direccion" rows="1" class="form-control" placeholder="Direccion del Socio"></textarea>
          </div>
          <div class="form-group">
            <textarea name="telefono" rows="1" class="form-control" placeholder="Telefono del Socio"></textarea>
          </div>
          <div class="form-group">
            <textarea name="grupo_familair" rows="1" class="form-control" placeholder="Grupo Familair del Socio"></textarea>
          </div>
          <input type="submit" name="guardar" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>idsocio</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Direccion</th>
            <th>Tefefono</th>
            <th>Grupo Familiar</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM socio";
          $result_socios = mysqli_query($mysqli, $query);    

          while($row = mysqli_fetch_assoc($result_socios)) { ?>
          <tr>
            <td><?php echo $row['idsocio']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['grupo_familair']; ?></td>
            <td>
              <a href="editar.php?id=<?php echo $row['idsocio']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar.php?id=<?php echo $row['idsocio']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
