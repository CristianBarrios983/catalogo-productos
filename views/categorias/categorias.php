<?php
  session_start();
  require_once 'c://xampp/htdocs/catalogo/controllers/authController.php';
  $obj = new AuthController();
  if($obj->isLogged() === true){
      include_once '../includes/head.php';
      include_once '../includes/menu.php';

      require_once 'c://xampp/htdocs/catalogo/controllers/categoriasController.php';
      $obj = new CategoriasController();
      $rows = $obj->index();
?>

<div class="container">
  <div class="row">
    <div class="title my-3">
      <h1 class="fs-3">Categorias</h1>
    </div>
  </div>
  <div class="row">
    <div class="tabla-productos">
      <div class="mb-3">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRegistro">Registrar categoria</a>
      </div>
      <table class="table table-hover" id="tabla">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($rows) : ?>
            <?php foreach ($rows as $row) : ?>
              <tr>
                <th scope="row"><?= $row[0] ?></th>
                <td><?= $row[1] ?></td>
                <td><?= $row[2] ?></td>
                <td>
                  <a href="#" class="btn btn-warning abreModalActualizar" data-bs-toggle="modal" data-bs-target="#modalActualizar">Editar</a>
                  <a href="#" data-id="<?= $row[0] ?>" class="btn btn-danger" onclick="confirmDelete(this)">Eliminar</a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="4" class="text-center">No hay registros actualmente</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal registro -->
<div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar categoria</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="store.php" method="POST">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre categoria</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion (Opcional)</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion">
          </div>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Actualizar -->
<div class="modal fade" id="modalActualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar categoria</h1>
        <button type="button" class="btn-close cerrarModalActualizar" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="update.php" method="POST">
          <div class="mb-3">
            <input type="hidden" class="form-control" id="id" name="id">
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre categoria</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion (Opcional)</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion">
          </div>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="../../assets/js/funciones.js"></script>
<script src="../../assets/js/mostrarDatosModal.js"></script>

<?php
    }else{
        echo "<script language='Javascript'>alert('No estas logueado');location.href = '../login.php';</script>`;";
        // header("Location: login.php");
    }
?>

<?php
include_once '../includes/footer.php';
?>