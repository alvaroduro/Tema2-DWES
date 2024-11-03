<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
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
        <h1>Ejercicio 1</h1>
        <?php require '../includes/nav.php'; ?>
        <h3 class="titulo_ejercicio fst-italic">Ejercicio 1. Crea dos variables cuyo nombre sea “uno” y “dos” he imprímelas por
            pantalla. Pon un comentario con el tipo de dato que contienen.
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
        //Variables
        $uno = 1;
        $dos = 2;
        //Imprimimos por pantalla
        echo "Variable uno= " . $uno . "</br>";
        echo "Variable dos= " . $dos;
        ?>
    </div>
</body>
<!--Incluimos Footer-->
<?php require '../includes/footer.php'; ?>
<script src="ejercicio1.js"></script>

</html>