


<div class="container">
       
    <div class="container">
        <div class="row">
            <h3>tipos</h3>
        </div>
        <div class="row">
            <div id="tabla"></div>
        </div>
        
    </div>

    <div id="modal"></div>
    
   

<script type="text/javascript">
    $(document).ready(function(){
$('#tabla').load('tablaTipos.php')
$('#modal').load('modalTipos.php')
    });

</script>
<script>
 






 function buscar_ajax(cadena){
		$.ajax({
		type: 'POST',
		url: 'buscar.php',
		data: 'cadena=' + cadena,
		success: function(respuesta) {
			$('#mostrar').html(respuesta);
	   }
	});
	}

    function guardar(){
var tipo=$('#txtTipoP').val();

var sql="INSERT INTO Proveedores(proveedor) VALUES('"+tipo+"')";
var cadena="sql="+sql+"&operacion=1";
$.ajax({
type:"POST",
url:"registrosTipo.php",
data:cadena,
success:function(r){
    $('#tabla').load('views/profesores.php');
    alertify.success("Se añadio correctamente");
},
error:function(r){ 
alertify.error("Error: "+r);    
}

});


}
    function guardarTipo(){
var tipo=$('#txtTipo').val();
var unidad=$('#unidad').val();
var curso=$('#curso1').val();
var sql="INSERT INTO Logistica(nombre,unidad,id_proveedor) VALUES('"+tipo+"','"+unidad+"',"+curso+")";
var cadena="sql="+sql+"&operacion=1";
$.ajax({
type:"POST",
url:"registrosTipo.php",
data:cadena,
success:function(r){
    $('#tabla').load('tablaTipos.php');
    alertify.success("Se añadio correctamente");
},
error:function(r){ 
alertify.error("Error: "+r);    
}

});


}


function datosEditar(datos){
d=datos.split('||');
  $('#txtIdTipo').val(d[0]);
  $('#txtTipoM').val(d[1]);
  $('#unidadM').val(d[2]);
  $('#cursoM').val(d[3]);
   }


   function modificarTipo(){
        var id=$('#txtIdTipo').val();
        var tipo=$('#txtTipoM').val();
        var curso=$('#unidadM').val();
        var curso1=$('#cursoM').val();
        var sql="UPDATE Logistica SET nombre='"+tipo+"', unidad='"+curso+"',id_proveedor='"+curso1+"'  WHERE id="+id;
        var cadena="sql="+sql+"&operacion=2";
        $.ajax({
        type:"POST",
        url:"registrosTipo.php",
        data:cadena,
        success:function(r){
            $('#tabla').load('tablaTipos.php');
            alertify.success("Se modifico correctamente");
        },
        error:function(r){ 
        alertify.error("Error: "+r);    
        }
        
        });
        
        
        }

function borrarSiNo(id) {
    alertify.confirm("Nombre","¿Seguro que quiere eliminar el alumno?"),
    function(){eliminarTipo(id)},
    function(){  alertify.error("Error eliminacion. ")}
    
}
function eliminarTipo(id){
var sql="DELETE FROM Logistica WHERE id="+id;
var cadena="sql="+sql+"&operacion=3";
$.ajax({
type:"POST",
url:"registrosTipo.php",
data:cadena,
success:function(r){
    $('#tabla').load('tablaTipos.php');
    alertify.success("El tipo a sido eliminado");
},
error:function(r){ 
alertify.error("Error: "+r);    
}

});

        }
        function eliminarproveedor(id){
            id=$('#proveedor').val();
var sql="DELETE FROM Proveedores WHERE id="+id;
var cadena="sql="+sql+"&operacion=3";
$.ajax({
type:"POST",
url:"registrosTipo.php",
data:cadena,
success:function(r){
    $('#tabla').load('tablaTipos.php');
    alertify.success("El tipo a sido eliminado");
},
error:function(r){ 
alertify.error("Error: "+r);    
}

});

        }

</script>