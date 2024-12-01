<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 23</title>
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
        <h1>Ejercicio 23</h1>
        <?php require '../includes/nav.php'; ?>
        <h3 class="titulo_ejercicio fst-italic">Crea una sesión que vaya aumentando su valor en uno o disminuyendo en uno en función de si el parámetro GET “counter” está a uno a cero.</h3>
    </div>

    <!--Botones-->
    <div class="container botones d-flex my-5">
        <button type="button" class="btn btn-success mx-4 btnAbrir" onclick="mostrarDiv()">Abrir Ejercicio</button>
        <button type="button" class="btn btn-success btncerrar" onclick="ocultarDiv()">Cerrar Ejercicio</button>
    </div>

    <!--Div soluciones-->
    <div class="container text-center my-5 border border-primary w-50 " id="solucionEjer">
        <h4>Solución Ejercicio</h4>

        <?php
        //Iniciamos sesión
        session_start();

        //Iniciamos el contador en la sesión si no existe
        if (!isset($_SESSION['contador'])) {
            $_SESSION['contador'] = 0;
            var_dump($_SESSION);
        }

        //Obtenemos el valor del parámetro GET conunter de la URL
        $counter = isset($_GET['counter']) ? intval($_GET['counter']) : null; //Si no esta defindo, lo ponemos a null
        $_SESSION['counter'] = 0;
        echo "contador = ".$_GET['counter']."</br>";

        //Modificamos el contador en funcion de counter
        if ($counter === 1) {
            $_SESSION['contador'] = $_SESSION['contador']--;
            echo "Si vale 1 = ".$_SESSION['contador']."</br>";
        } elseif ($counter === 0) {
            $_SESSION['contador'] = $_SESSION['contador']++;
            echo "Si vale 0 = ".$_SESSION['contador']."</br>";
        }

        echo "El valor actual del contador es: " . $_SESSION['contador'];
        ?>
    </div>
</body>
<!--Incluimos Footer-->
<?php require '../includes/footer.php'; ?>
<script src="../ejer1/ejercicio1.js"></script>

</html>