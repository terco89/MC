<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">DNI</th>
      <th scope="col">Cargo</th>
      <th scope="col">Salario</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($empleados as $e) { ?>
      <tr id="s<?php echo $e["id"]; ?>">
        <th scope="row">
          <?php echo $e["id"]; ?>
        </th>
        <td>
          <?php echo $e["nombre_completo"]; ?>
        </td>
        <td>
          <?php echo $e["dni"]; ?>
        </td>
        <td>
          <?php echo $e["rol"]; ?>
        </td>
        <td>
          <?php echo $e["salario"]; ?>
        </td>
        <td style="display:none;">
          <?php echo $e["id_rol"]; ?>
        </td>
        <td><button onclick="abrirOpciones(<?php echo $e['id']; ?>)" type="button"
            class="btn btn-warning">Modificar</button></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<div id="opciones" style="background-color: skyblue; width:60%; margin-left:10%; margin-top: -10%; padding:20px; position: absolute; display:none;">
  <p style="text-align: center;">Menu de opciones</p>
  <h1>Datos</h1>
  <br>
  <div id="formulario">
    <p>Nombre</p>
    <input type="text" name="nombre">
    <p>DNI</p>
    <input type="text" name="dni">
    <p>Cargo</p>
    <select>
      <option value="1">Cajero</option>
      <option value="2">Gerente</option>
      <option value="3">Cocinero</option>
      <option value="4">Limpiador</option>
      <option value="5">Logistica</option>
      <option value="6">Repartidor</option>
    </select>
    <p>Salario</p>
    <input type="text" name="salario">
  </div>
  <br>
  <p style="text-align:center;"><button class="btn btn-success" style="margin-right:20px;" onclick="enviarDatos()">Guardar Cambios</button>
  <button class="btn btn-light"  style="margin-right:20px;" onclick="document.getElementById('opciones').style.display = 'none'">Cancelar</button>
  <button class="btn btn-danger"  style="margin-right:20px;" onclick="eliminarEmpleado()">Despedir</button></p>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  var formulario = document.getElementById("formulario");
  var id = 1;
  var cargos = ["v","Cajero","Gerente","Cocinero","Limpiador","Logistica","Repartidor"];
  function abrirOpciones(id){
    var fila = document.querySelector("tbody #s"+id).childNodes;
    formulario.childNodes[3].value = fila[3].innerHTML.trim();
    formulario.childNodes[7].value = fila[5].innerHTML.trim();
    formulario.childNodes[11].value = fila[11].innerHTML.trim();
    formulario.childNodes[15].value = fila[9].innerHTML.trim();
    document.getElementById("opciones").style.display = "block";
    this.id = id;
  }
  function enviarDatos(){
    pnom= document.querySelector("#formulario").childNodes[3].value; 
    pdni= document.querySelector("#formulario").childNodes[7].value; 
    pcar= document.querySelector("#formulario").childNodes[11].value; 
    psal= document.querySelector("#formulario").childNodes[15].value; 
    // Función que envía y recibe respuesta con AJAX
    $.ajax({
     type: 'POST',  // Envío con método POST
     url: 'empleados.php',  // Fichero destino (el PHP que trata los datos)
     data: { pid: id, pnom: pnom, pdni: pdni, pcar: pcar, psal:psal} // Datos que se envían
     }).done(function( msg ) {  // Función que se ejecuta si todo ha ido bien
      var fila = document.querySelector("tbody #s"+id).childNodes;
    fila[3].innerHTML = formulario.childNodes[3].value;
    fila[5].innerHTML = formulario.childNodes[7].value;
    fila[7].innerHTML = cargos[formulario.childNodes[11].value];
    fila[11].innerHTML = formulario.childNodes[11].value;
    fila[9].innerHTML = formulario.childNodes[15].value;
    document.getElementById("opciones").style.display = "none";
     }).fail(function (jqXHR, textStatus, errorThrown){ // Función que se ejecuta si algo ha ido mal
     // Mostramos en consola el mensaje con el error que se ha producido
     $("#consola").html("The following error occured: "+ textStatus +" "+ errorThrown); 
    });
  }
  function eliminarEmpleado(){
    $.ajax({
     type: 'POST',  // Envío con método POST
     url: 'empleados.php',  // Fichero destino (el PHP que trata los datos)
     data: { pid: id} // Datos que se envían
     }).done(function( msg ) {  // Función que se ejecuta si todo ha ido bien
      document.querySelector("tbody").removeChild(document.querySelector("tbody #s"+id));
    document.getElementById("opciones").style.display = "none";
     }).fail(function (jqXHR, textStatus, errorThrown){ // Función que se ejecuta si algo ha ido mal
     // Mostramos en consola el mensaje con el error que se ha producido
     $("#consola").html("The following error occured: "+ textStatus +" "+ errorThrown); 
    });
  }
</script>