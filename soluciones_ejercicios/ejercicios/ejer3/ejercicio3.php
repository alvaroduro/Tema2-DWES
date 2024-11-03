<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <!--Incluimos BS-->
    <?php require '../includes/boostrap.php'; ?>
    <style>
        #solucionEjer {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <h1>Ejercicio 3</h1>
        <?php require '../includes/nav.php'; ?>
        <h3 class="titulo_ejercicio fst-italic">Modifica el ejercicio anterior para que muestre al lado de cada cuadrado si es un número par o impar.
    </div>

    <!--Botones-->
    <div class="container botones d-flex my-5">
        <button type="button" class="btn btn-success mx-4 btnAbrir" onclick="mostrarDiv()">Abrir Ejercicio</button>
        <button type="button" class="btn btn-success btncerrar" onclick="ocultarDiv()">Cerrar Ejercicio</button>
    </div>

    <!--Div soluciones-->
    <div class="container text-center my-5 border border-primary w-50 " id="solucionEjer">
        <h4>Solución Ejercicio</h4>

        <!--Solucion Ejercicio-->
        <?php
        $cuadrado;
        //Variables
        for ($i = 1; $i <= 30; $i++) {
            $cuadrado = $i * $i;

            //Comprobamos si es par o impar
            if ($cuadrado % 2 == 0) {
                echo "El cuadrado de <b>$i</b> es:   <i>$cuadrado</i> y es <b>par</b> </br>";
            } else {
                echo "El cuadrado de <b>$i</b> es:   <i>$cuadrado</i> y es <b>impar</b> </br>";
            }
        }
        ?>
    </div>
</body>
<!--Incluimos Footer-->
<?php require '../includes/footer.php'; ?>
<script src="../ejer1/ejercicio1.js"></script>

</html>