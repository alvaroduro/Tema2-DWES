<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11</title>
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
        <h1>Ejercicio 11</h1>
        <?php require '../includes/nav.php'; ?>
        <h3 class="titulo_ejercicio fst-italic">Un número es bueno si y solo si la suma de sus divisores sin contarse
            el mismo da ese número. Programa que calcule si un número es bueno o no.</h3>
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
        $bueno = true;
        $numero = $_GET['numero'];
        $sumaDivisores = 0;
        //Si el número es 0
        if ($numero <= 0) {
            $bueno = false;
        } else {
            // Encontrar los divisores (excluyendo el número mismo)
            for ($i = 1; $i <= $numero / 2; $i++) {
                if ($numero % $i == 0) {
                    $sumaDivisores += $i;
                }
            }

            // Verificar si la suma de los divisores es igual al número
            if ($sumaDivisores === $numero) {
                $bueno = false;
            }
        }

        if ($bueno) {
            echo "El número $numero es bueno.";
        } else {
            echo "El número $numero no es bueno.";
        }

        ?>
    </div>
</body>
<!--Incluimos Footer-->
<?php require '../includes/footer.php'; ?>
<script src="../ejer1/ejercicio1.js"></script>

</html>