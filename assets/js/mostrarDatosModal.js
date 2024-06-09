const table = document.getElementById('tabla');
  const modal = document.getElementById('modalActualizar');
  const inputs = document.querySelectorAll('#modalActualizar input');
  let count = 0;

  window.addEventListener('click', (e) => {
    if (e.target.matches('.abreModalActualizar')) {
      let data = e.target.parentElement.parentElement.children;
      fillData(data);
    }

    if (e.target.matches('.cerrarModalActualizar')) {
      count = 0;
    }
  });

  const fillData = (data) => {
    for (let index of inputs) {
      index.value = data[count].textContent;
      count += 1;
    }
  }