document.addEventListener("DOMContentLoaded", () => {
    fetch('getCategories.php')
     .then(response => response.json())
     .then(data => {
       const select = document.getElementById('categoria');
       data.forEach(categoria => {
         // console.log(`${categoria.id} ${categoria.nombre}`);
         const option = document.createElement('option');
         option.value = categoria.id;
         option.text = categoria.nombre;
         select.add(option);
       });
     })
     .catch(error => console.error('Error:', error));
 });
 
 function confirmDelete(element) {
     const id = element.getAttribute('data-id');
     const confirmation = confirm('¿Estás seguro de que quieres eliminar este registro?');
 
     if (confirmation) {
       // Redirigir a la página de eliminación con el ID
       window.location.href = `delete.php?id=${id}`;
     }
 }
 
 function openEditModal(categoriaActual){
   fetch('getCategories.php')
     .then(response => response.json())
     .then(data => {
       const select = document.getElementById('categoriaEditar');
       select.innerHTML = ''; // Limpiar opciones existentes
       data.forEach(categoria => {
         // console.log(`${categoria.id} ${categoria.nombre}`);
         const option = document.createElement('option');
         option.value = categoria.id;
         option.text = categoria.nombre;
         if (categoria.id == categoriaActual) {
           option.selected = true; // Seleccionar la categoría actual del producto
         }
         select.add(option);
       });
     })
     .catch(error => console.error('Error:', error));
 }