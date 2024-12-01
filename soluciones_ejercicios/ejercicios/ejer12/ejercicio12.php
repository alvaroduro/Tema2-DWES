<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
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
        <h1>Ejercicio 12</h1>
        <?php require '../includes/nav.php'; ?>
        <h3 class="titulo_ejercicio fst-italic">Hacer un programa que tenga un array de 5 números enteros y hacer
            lo siguiente con él:
            1. Recorrerlo y mostrarlo.
            2. Ordenarlo y mostrarlo.
            3. Mostrará su longitud.
            4. Buscar en el vector.</h3>
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
        //Array
        $enteros = array(2, 4, 6, 9, 10);
        /*
        4. Buscar en el vector.*/
        //1
        echo "1. Recorremos y mostramos los números</br>";
        foreach ($enteros as $numero) {
            echo $numero . ", ";
        }

        echo "</br>2. Ordenamos y mostramos los números</br>";
        asort($enteros); // Ordenamos
        foreach ($enteros as $numero) {
            echo $numero . ", ";
        }

        echo "</br>3. Longitud del array: " . count($enteros) . " numeros</br>";

        // 4. Buscar en el array
        $buscar = 2; // Número a buscar
        $indice = array_search($buscar, $enteros);

        if ($indice !== false) {
            echo "4. El número $buscar se encuentra en el índice $indice del array.\n";
        } else {
            echo "4. El número $buscar no se encuentra en el array.\n";
        }
        ?>
    </div>
</body>
<!--Incluimos Footer-->
<?php require '../includes/footer.php'; ?>
<script src="../ejer1/ejercicio1.js"></script>

</html>