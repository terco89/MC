<h1>Cambia tus credenciales</h1>
<i>
    <p style="opacity:0.4;">Advertencia: El cambio se efectúa una vez modificado los datos, no habra forma de recuperar
        las credenciales anteriores</p>
</i>
<div style="margin-top:100px; width: 80%;">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Elegir Empleado</label>
        <div class="col-sm-10">
            <select class="form-control" id="sel" name="id" required>
                <?php foreach ($ventas as $e) { ?>
                    <option value="<?php echo $e["id"]; ?>" <?php if ($e["id"] == $_SESSION["usuario"]["id"]) {
                           echo "selected";
                       } ?>>
                        <?php echo $e["nombre_completo"]; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Contraseña actual</label>
        <div class="col-sm-10">
            <input type="password" name="actual" class="form-control" id="inputPassword2" placeholder="Password"
                required>
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Contraseña nueva</label>
        <div class="col-sm-10">
            <input type="password" name="nueva" class="form-control" id="inputPassword3" placeholder="Password"
                required>
            <p style="opacity:0.5;" >La contraseña debe contener minimo 8 caracteres (maximo 64),
                una
                mayuscula, una miniscula, un numero y un caracter especial</p>
                <p style="color:red; display:none;" id="error">Los datos enviados no son validos</p>
            <p style="color:green; display:none;" id="exito">Las credenciales fueron cambiadas correctamente</p>
        </div>
    </div>
    <br>
    <br>
    <div class="form-group row" style="text-align:center;">
        <div class="col-sm-10">
            <button onclick="subir()" class="btn btn-primary">Guardar cambios</button>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    const letrasMayusculas = Array.from({ length: 26 }, (_, i) => String.fromCharCode(65 + i));

    const letrasMinusculas = Array.from({ length: 26 }, (_, i) => String.fromCharCode(97 + i));

    const numeros = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];

    const caracteresEspeciales = ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '=', '+','¡','?','¿','\'','"','¨','\\','~','.',',',';',':','`','{','}','[',']','´','°','|','¬'];

    function subir() {
        document.getElementById("error").style.display = "none";
        var id = document.getElementById("sel").value
        var actual = document.getElementById("inputPassword2").value
        var nueva = document.getElementById("inputPassword3").value
        if (nueva.lenght < 8 || nueva.lenght > 64 || NoCumple(nueva)) {
            document.getElementById("error").style.display = "block";
            return;
        }
        $.ajax({
            type: 'POST',  // Envío con método POST
            url: 'credenciales.php',  // Fichero destino (el PHP que trata los datos)
            data: { id: id, actual: actual, nueva: nueva } // Datos que se envían
        }).done(function (msg) {  // Función que se ejecuta si todo ha ido bien
            console.log(msg)
            if (msg != "exito") {
                document.getElementById("exito").style.display = "none";
                document.getElementById("error").style.display = "block";
            }
            else {
                document.getElementById("error").style.display = "none";
                document.getElementById("exito").style.display = "block";
            }
        }).fail(function (jqXHR, textStatus, errorThrown) { // Función que se ejecuta si algo ha ido mal
            // Mostramos en consola el mensaje con el error que se ha producido
            $("#consola").html("The following error occured: " + textStatus + " " + errorThrown);
        });
    }

    function NoCumple(contra) {
        var o = 0;
        for (var i = 0; i < letrasMayusculas.length; i++) {
            if (contra.split(letrasMayusculas[i],).length > 1) {
                o++;
                break;
            }
        }
        for (var i = 0; i < letrasMinusculas.length; i++) {
            if (contra.split(letrasMinusculas[i]).length > 1) {
                o++;
                break;
            }
        }
        for (var i = 0; i < caracteresEspeciales.length; i++) {
            if (contra.split(caracteresEspeciales[i]).length > 1) {
                o++;
                break;
            }
        }
        for (var i = 0; i < numeros.length; i++) {
            if (contra.split(numeros[i]).length > 1) {
                o++;
                break;
            }
        }
        if (o == 4) {
            return false;
        }
        else {
            return true;
        }
    }
</script>