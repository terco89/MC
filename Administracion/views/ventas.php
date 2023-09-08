<button onclick="generarVentas()">Generar informe de ventas</button>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script>
    function generarVentas(){
        const doc = new jspdf.jsPDF();
        doc.text("Hello world!", 10, 10);
        doc.save("a4.pdf");
    }
</script>