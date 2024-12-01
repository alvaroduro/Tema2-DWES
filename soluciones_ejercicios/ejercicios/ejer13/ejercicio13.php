<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13</title>
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
        <h1>Ejercicio 13</h1>
        <?php require '../includes/nav.php'; ?>
        <h3 class="titulo_ejercicio fst-italic">Escribe un programa que muestre la dirección IP del usuario que
            visita nuestra web y si usa Firefox darle la enhorabuena.</h3>
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
        // Obtener la dirección IP del usuario
        $ipUsuario = $_SERVER['REMOTE_ADDR'];

        // Obtener el User-Agent del navegador
        $navegador = $_SERVER['HTTP_USER_AGENT'];
        var_dump($navegador);

        // Mostrar la dirección IP del usuario
        echo "Tu dirección IP es: $ipUsuario<br>";

        // Verificar si el usuario usa Firefox
        if (strpos($navegador, 'Firefox') !== false) {
            echo "¡Enhorabuena! Estás usando Firefox, un navegador excelente. 🦊";
        } else {
            echo "Parece que no estás usando Firefox. Considera probarlo. 😊";
        }
        ?>
    </div>
</body>
<!--Incluimos Footer-->
<?php require '../includes/footer.php'; ?>
<script src="../ejer1/ejercicio1.js"></script>

</html>