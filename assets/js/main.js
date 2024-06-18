let productList; // Declarar la variable productList en un contexto más amplio

    const cargarProductos = () => {
      fetch('views/catalogo/productos.php')
        .then(respuesta => respuesta.json())
        .then(productos => {
          const contenedorProductos = document.getElementById('productos');

          productos.forEach(producto => {
            const tarjetaProducto = document.createElement('div');
            tarjetaProducto.className = 'card bg-white p-3';
            tarjetaProducto.setAttribute('style', 'width: 18rem;');
            tarjetaProducto.innerHTML = `
              <div class="img-hover">
                <img src="imagenes/imagen-prueba.jpg" class="card-img-top rounded-0" alt="...">
                <div class="overlay">
                  <a class="link"><i class="bi bi-eye fs-4"></i></a>
                </div>
              </div>
              <div class="card-body p-0 pt-3">
                <h5 class="card-title card-description name">${producto.nombre}</h5>
                <p class="card-text text-success fw-semibold fs-4 price">$${producto.precio}</p>
                <p class="card-text text-muted category">${producto.nombre_categoria}</p>
                <a href="#" class="btn btn-success rounded-0">Consultar <i class="bi bi-whatsapp"></i></a>
              </div>
            `;
            contenedorProductos.append(tarjetaProducto);
          });

          // Inicializar List.js después de cargar los productos
          productList = new List('catalogo', {
            valueNames: ['name', 'price', 'category'],
            item: 'card'
          });
        });
    }

    // Función para filtrar por categoría
    function filterCategory(category) {
      if (category === 'all') {
        productList.filter();
      } else {
        productList.filter(function(item) {
          return item.values().category === category;
        });
      }
    }

    // Función para inicializar la carga de productos al cargar la página
    cargarProductos();