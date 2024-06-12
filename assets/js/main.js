const cargarProductos = () => {
    fetch('views/catalogo/productos.php')
        .then(respuesta => respuesta.json())
        .then(productos => {
            const contenedorProductos = document.getElementById('productos');

            productos.forEach(producto => {
                // console.log(`${producto.id} ${producto.nombre} ${producto.descripcion} ${producto.precio} ${producto.cantidad} ${producto.nombre_categoria}`)
                const tarjetaProducto = document.createElement('div');
                tarjetaProducto.className = 'col-12 col-sm-6 col-md-4 col-lg-3';
                tarjetaProducto.innerHTML = `
                        <div class="card">
                            <div class="imagen-producto overflow-hidden">
                                <img src="imagenes/imagen-prueba.jpg" class="card-img-top efecto-zoom" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">${producto.nombre}</h5>
                                <p class="card-text">${producto.descripcion}</p>
                                <p class="card-text text-success fs-5">$${producto.precio}</p>
                                <a href="#" class="btn btn-success">Consultar <i class="bi bi-whatsapp"></i></a>
                            </div>
                        </div>
                `;

                contenedorProductos.append(tarjetaProducto);
            });
        });
}

cargarProductos();