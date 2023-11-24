const vaciarPedidoButton = document.querySelector('.vaciar-pedido');
const agregarBotones = document.querySelectorAll('.agregar-al-pedido');
const itemsPedido = document.querySelector('.items-pedido');
var productosCantidad=[];
var productosNombre=[];
agregarBotones.forEach(agregarBoton => {
    const agregarCantidad = cantidad => {
        cantidadNumero.textContent = parseInt(cantidadNumero.textContent) + cantidad;
        
        if (parseInt(cantidadNumero.textContent) < 0) {
            cantidadNumero.textContent = '0';
        }
    };
    agregarBoton.parentNode.querySelector('.agregar').addEventListener('click', () => agregarCantidad(1));
    agregarBoton.parentNode.querySelector('.restar').addEventListener('click', () => agregarCantidad(-1));
    const cantidadNumero = agregarBoton.parentNode.querySelector('.cantidad-numero');
    
    agregarBoton.addEventListener('click', () => {
        const producto = agregarBoton.parentNode;
        const nombreProducto = producto.querySelector('h3').textContent;
     var cantidad = parseInt(cantidadNumero.textContent);
        
      for(var i = 0; i < productosNombre.length; i++){

        if(productosNombre[i]==nombreProducto){
            productosCantidad[i]+=cantidad;
            var li = document.getElementById("n"+i);
            li.innerHTML = `${nombreProducto} - Cantidad: ${productosCantidad[i]}`;
            cantidadNumero.textContent = '0';
            return;
        }
    }
    productosCantidad.push(cantidad);
    productosNombre.push(nombreProducto);
        if (cantidad > 0) {
            const nuevoItem = document.createElement('li');
            nuevoItem.setAttribute("id","n"+(productosNombre.length-1).toString());
            nuevoItem.textContent = `${nombreProducto} - Cantidad: ${cantidad}`;
            itemsPedido.appendChild(nuevoItem);
            cantidadNumero.textContent = '0';
        }
    });

  
});

function enviar_formulario() {
    var element = document.getElementById("nose");
    for(var i = 0; i < productosCantidad.length; i++){
        element.value += productosNombre[i]+":"+productosCantidad[i]
        if(i != productosCantidad.length-1){
            element.value += "/&"
        }
    }
    
    document.getElementById("mienvio").submit();
 }

vaciarPedidoButton.addEventListener('click', () => {
   productosCantidad=[];
productosNombre=[];
    itemsPedido.innerHTML = ''; // Vaciar el pedido al hacer clic en el botón "Vaciar Pedido"
});


