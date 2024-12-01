<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 18</title>
    <!--Incluimos BS-->
    <?php

    require '../includes/boostrap.php'; ?>
    <style>
        #solucionEjer {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <h1>Ejercicio 18</h1>
        <?php require '../includes/nav.php'; ?>
        <h3 class="titulo_ejercicio fst-italic">El cálculo del factorial se realiza en un bucle que va disminuyendo el
            valor de una variable y multiplicando todos los valores entre sí, como ya hemos
            visto anteriormente.
            Aprovechando este patrón puede crear una función que realice la factorial del
            número que le pasemos por parámetro, ahorrando así líneas de código.</h3>
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
        //Funcion
        function factorial($numero) {
            //Variables
            $factorial = $numero;
            //Factorial del número 5(5x4x3x2x1 = 120)
        for ($i=$numero; $i > 1; $i--) { 
            $factorial = $factorial * ($i-1);
        }
        return "El factorial del número ".$numero." es = <b>".$factorial."</b></br>";
        //echo "El factorial del número ".$numero." es = <b>".$factorial."</b></br>";
        };

        echo factorial(6);
        ?>
    </div>
</body>
<!--Incluimos Footer-->
<?php require '../includes/footer.php'; ?>
<script src="../ejer1/ejercicio1.js"></script>

</html>