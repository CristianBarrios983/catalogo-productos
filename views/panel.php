<?php
    session_start();

    require_once 'c://xampp/htdocs/catalogo/controllers/authController.php';
    $obj = new AuthController();
    if($obj->isLogged() === true){

        include_once 'includes/head.php';
        include_once 'includes/menu.php';

        require_once 'c://xampp/htdocs/catalogo/controllers/categoriasController.php';
        $objCategoria = new CategoriasController();
        $cantidadCategorias = $objCategoria->cantCategorias();

        require_once 'c://xampp/htdocs/catalogo/controllers/productosController.php';
        $objProducto = new ProductosController();
        $cantidadProductos = $objProducto->cantProductos();

?>

      <div class="container">
        <div class="row">
            <div class="title my-3">
                <h1 class="fs-3">Bienvenido <?php echo $_SESSION["usuario"]; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="cards d-flex justify-content-center justify-content-md-start gap-3 flex-wrap">
                <div class="col-12 col-md-3">
                    <div class="card text-bg-primary mb-3">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                          <h5 class="card-title">Productos</h5>
                          <p class="card-text">
                            <?php
                                if ($cantidadProductos !== false) {
                                    echo $cantidadProductos;
                                } else {
                                    echo "Error";
                                }
                            ?>
                          </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card text-bg-warning mb-3 text-white">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                          <h5 class="card-title">Categorias</h5>
                          <p class="card-text">
                            <?php
                                if ($cantidadCategorias !== false) {
                                    echo $cantidadCategorias;
                                } else {
                                    echo "Error";
                                }
                            ?>
                          </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>


<?php
    }else{
        echo "<script language='Javascript'>alert('No estas logueado');location.href = 'login.php';</script>`;";
        // header("Location: login.php");
    }
?>

<?php
    include_once 'includes/footer.php';
?>
