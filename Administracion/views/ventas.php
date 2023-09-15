<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">a</th>
      <th scope="col">b</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ventas as $e) { ?>
      <tr>
        <th scope="row">
          <?php echo $e["venta"]; ?>
        </th>
        <td>
          <?php echo str_split($e["fecha"]["date"],10)[0]; ?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<div id="tep1" style="display:none;">
    <h1 style="text-align:center;">Ventas del mes</h1>
    <canvas id="grafica" ></canvas>
</div>
<style>
#grafica{
    max-width: 900px;
    max-height: 480px;
    margin-left: 150px;
}
</style>
<button onclick="generarVentas()">Generar informe de ventas</button>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
<script>
    const $elementoParaConvertir = document.querySelector("#tep1"); // <-- Aquí puedes elegir cualquier elemento del DOM
    function generarVentas(){
    $elementoParaConvertir.style.display = "block";
    html2pdf()
    .set({
        margin: 0,
        filename: 'informe_ventas.pdf',
        image: {
            type: 'jpeg',
            quality: 0.98
        },
        html2canvas: {
            scale: 3, // A mayor escala, mejores gráficos, pero más peso
            letterRendering: true,
        },
        jsPDF: {
            unit: "in",
            format: "a3",
            orientation: 'landscape' // landscape o portrait
        }
    })
    .from($elementoParaConvertir)
    .save()
    .catch(err => console.log(err));
    $elementoParaConvertir.style.display = "none";
    }

    // Obtener una referencia al elemento canvas del DOM
    const $grafica = document.querySelector("#grafica");
    // Las etiquetas son las que van en el eje X. 
    const etiquetas = ["01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"]
    // Podemos tener varios conjuntos de datos. Comencemos con uno
    const datosVentas2020 = {
        label: "Ventas en pesos",
        data: [<?php
        $dou1 = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
        for($i = 0; $i < count($ventas);$i++){
            $dou1[intval(str_split($ventas[$i]["fecha"]["date"],2)[4])] += $ventas[$i]["venta"];
        }
        for($i = 0; $i < 30; $i++){
            echo $dou1[$i];
            if($i != 29){
                echo ",";
            }
        }
        ?>], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
        backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
        borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
        borderWidth: 1,// Ancho del borde
    };
    new Chart($grafica, {
        type: 'line',// Tipo de gráfica
        data: {
            labels: etiquetas,
            datasets: [
                datosVentas2020,
                // Aquí más datos...
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
            },
        }
    });
</script>