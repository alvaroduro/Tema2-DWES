<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
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
        <h1>Ejercicio 2</h1>
        <?php require '../includes/nav.php'; ?>
        <h3 class="titulo_ejercicio fst-italic">Ejercicio 2. Escribe un programa(bucle for) que imprima por pantalla los cuadrados (el número multiplicado por sí mismo) de los 30 primeros números naturales.

    </div>

    <!--Botones-->
    <div class="container botones d-flex my-5">
        <button type="button" class="btn btn-success mx-4 btnAbrir" onclick="mostrarDiv()">Abrir Ejercicio</button>
        <button type="button" class="btn btn-success btncerrar" onclick="ocultarDiv()">Cerrar Ejercicio</button>
    </div>

    <!--Div soluciones-->
    <div class="container my-5 border border-primary w-25" id="solucionEjer">
        <h4>Solución Ejercicio</h4>

        <!--Solucion Ejercicio-->
        <?php
        $cuadrado;
        //Variables
        for ($i = 1; $i <= 30; $i++) {
            $cuadrado = $i * $i;
            //Imprimimos por pantalla
            echo "El cuadrado de <b>$i</b> es:   <i>$cuadrado</i> </br>";
        }
        ?>
    </div>
</body>
<!--Incluimos Footer-->
<?php require '../includes/footer.php'; ?>
<script src="../ejer1/ejercicio1.js"></script>

</html>