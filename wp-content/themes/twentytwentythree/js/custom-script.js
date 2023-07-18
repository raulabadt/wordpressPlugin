// Hacer una llamada AJAX a la API de WordPress para obtener los datos de las tiendas
function obtenerTiendas() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://localhost/wordpress/wp-json/flat101/v1/tiendas', true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var tiendas = JSON.parse(xhr.responseText);
        // Manipular los datos de las tiendas aquí
        console.log(tiendas);
      }
    };
    xhr.send();
  }
  
  // Llamar a la función para obtener los datos de las tiendas
  obtenerTiendas();
  