<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 21</title>
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
        <h1>Ejercicio 21</h1>
        <?php require '../includes/nav.php'; ?>
        <h3 class="titulo_ejercicio fst-italic">Utiliza la función filter_var para comprobar si el email que nos llega por la URL es un email valido.</h3>
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
        // Obtener el email desde la URL
        $email = isset($_GET['email']) ? $_GET['email'] : null;
        var_dump($_GET['email']);

        // Verificar si se proporcionó un email
        if ($email) {
            // Validar el email
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "El email '$email' es válido.";
            } else {
                echo "El email '$email' no es válido.";
            }
        } else {
            echo "No se proporcionó un email en la URL.";
        }
        ?>
    </div>
</body>
<!--Incluimos Footer-->
<?php require '../includes/footer.php'; ?>
<script src="../ejer1/ejercicio1.js"></script>

</html>