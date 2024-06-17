let dataTable = new DataTable("#tabla", {
    perPageSelect: [10,20,30,40,50,75,100],
    // Para cambiar idioma
    labels: {
                placeholder: "Buscar...",
                perPage: "{select} Registros por pagina",
                noRows: "Registro no encontrado",
                info: "Mostrando registros del {start} al {end} de {rows} registros"
            }
});


// Esto por si necesito solo el buscardor de dataTables:

// let dataTable = new DataTable("#productos", {
//     // Deshabilitar la paginación
//     paging: false,
//     // Deshabilitar la opción de mostrar cierta cantidad de registros por página
//     perPageSelect: false,
//     // Deshabilitar la opción de ordenar las columnas haciendo clic en los encabezados
//     sortable: false,
//     // Deshabilitar la opción de filtrado por columnas
//     filters: false,
//     // Deshabilitar la opción de mostrar información de la tabla (número de registros, etc.)
//     info: false,
//     // Personalizar el texto del buscador
//     labels: {
//         placeholder: "Buscar...",
//         noRows: "Registro no encontrado"
//     }
// });