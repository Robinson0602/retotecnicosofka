//Creamos una funcion encargada de hacer la busqueda dentro de la tabla

(function(document) {
    'buscador';
//Se crea la variable que va a ser introducida en el input "LightTableFilter"
    var LightTableFilter = (function(Arr) {

      var _input;

      // Creamos el evento dentro del input y tomara los elementos por clase, debido a esto añadimos el atributo data-table al input
      // Para que se pueda identificar mediante javascript
      function _onInputEvent(e) {
        _input = e.target;
        var tables = document.getElementsByClassName(_input.getAttribute('data-table'));

        //Hacemos un llamado a las tablas y posteriormente le decimos que seleciones los tbody de nuestro html y proceda a buscar
        Arr.forEach.call(tables, function(table) {
          Arr.forEach.call(table.tBodies, function(tbody) {
            Arr.forEach.call(tbody.rows, _filter);
          });
        });
      }

      //Se aplica el filtro para buscar dentro de la tabla
      function _filter(row) {
        var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
        row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
      }
        //Se devuelve el resultado
      return {
        init: function() {
          var inputs = document.getElementsByClassName('light-table-filter');
          Arr.forEach.call(inputs, function(input) {
            input.oninput = _onInputEvent;
          });
        }
      };
    })(Array.prototype);

    document.addEventListener('readystatechange', function() {
      if (document.readyState === 'complete') {
        LightTableFilter.init();
      }
    });

})(document);