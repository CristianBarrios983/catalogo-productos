<?php
    include_once '../includes/head.php';
    include_once '../includes/menu.php';

    require_once 'c://xampp/htdocs/catalogo/controllers/imagenesController.php';
    $obj = new ImagenesController();

    $id=$_GET['id'];
    $rows = $obj->show($id);
?>

<div class="container">
  <div class="row">
    <div class="title my-3">
      <h1 class="fs-3">Imagenes</h1>
    </div>
  </div>
  <div class="row">
    <div class="contenedor-imagenes">
      <div class="mb-3">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCargarImagen">Añadir imagenes</a>
      </div>
      <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap my-3">
        <?php if ($rows) : ?>
            <?php foreach ($rows as $row) : ?>
            <div class="img-hover">
              <img src="<?= $row[1] ?>" alt="" width="250px" height="250px">
              <div class="overlay">
                  <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalActualizarImagen" product-id="<?= $id ?>" data-id="<?= $row[0] ?>" onclick="openEditModalImage(this)"><i class="bi bi-pen-fill fs-4"></i></a>
                  <a class="btn btn-danger" product-id="<?= $id ?>" data-id="<?= $row[0] ?>" onclick="confirmDeleteImage(this)" ><i class="bi bi-trash3-fill fs-4"></i></a>
              </div>
            </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-center">Este producto no tiene imagenes</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal añadir imagen -->
<div class="modal fade" id="modalCargarImagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir imagen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="store.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <input type="hidden" value="<?= $id; ?>" name="id" id="id">
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Selecciona una imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen" onchange="vistaPreliminar(event)">
          </div>
          <div class="mb-3">
            <img class="d-block w-100" src="" alt="" id="img-preview">
          </div>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Actualizar imagen -->
<div class="modal fade" id="modalActualizarImagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar producto</h1>
        <button type="button" class="btn-close cerrarModalActualizar" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="update.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <input type="hidden" value="<?= $id; ?>" name="idImagen" id="idImagen">
          </div>
          <div class="mb-3">
            <input type="hidden" value="<?= $id; ?>" name="productoId" id="productoId">
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Selecciona una imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen" onchange="vistaPreliminarEditar(event)">
          </div>
          <div class="mb-3">
            <img class="d-block w-100" src="" alt="" id="img-preview-update">
          </div>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Script para visualizar imagenes en el modal -->
<script>
    document.getElementById('modalCargarImagen').addEventListener('hidden.bs.modal', function () {
      const imgPreview = document.getElementById('img-preview');
      imgPreview.src = '';  // Limpiar la vista previa de la imagen
    });

    const vistaPreliminar = (event) => {
        let imageSelected = new FileReader();
        let contenedorImg = document.getElementById('img-preview');

        imageSelected.onload = () =>{
            if(imageSelected.readyState == 2){
                contenedorImg.src = imageSelected.result;
            }
        }
        
        imageSelected.readAsDataURL(event.target.files[0]);
    }

    const vistaPreliminarEditar = (event) => {
        let imageSelected = new FileReader();
        let contenedorImg = document.getElementById('img-preview-update');

        imageSelected.onload = () =>{
            if(imageSelected.readyState == 2){
                contenedorImg.src = imageSelected.result;
            }
        }
        
        imageSelected.readAsDataURL(event.target.files[0]);
    }
</script>

<script src="../../assets/js/funciones.js"></script>

<?php
  include_once '../includes/footer.php';
?>