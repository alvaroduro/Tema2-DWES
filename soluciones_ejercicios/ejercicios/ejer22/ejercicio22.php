<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 22</title>
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
        <h1>Ejercicio 22</h1>
        <?php require '../includes/nav.php'; ?>
        <h3 class="titulo_ejercicio fst-italic">Crea una función a la que le pases un número y te saque su tabla de multiplicar.</h3>
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

        //Version PHP
        function tablaMultiplicar($numero)
        {
            echo "Tabla de multiplicar del número <b>" . $numero . "</b></br>";
            //Mostramos la tabla de multiplicar
            for ($i = 0; $i < 10; $i++) {
                echo $numero . " x " . $i . " = " . ($numero * $i) . "</br>";
            }
        }

        //Version HTML
        function tablaHtmlMultiplicar($numero)
        {
            echo "Tabla de multiplicar del número <b>" . $numero . "</b></br>";
            //Mostramos la tabla de multiplicar
        ?>
            <table class="table table-secondary">
                <thead>
                    <tr>
                        <th scope="col">MULTIPLICACION</th>
                        <th scope="col">RESULTADO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 1; $i < 10; $i++) {
                        echo "<tr>";
                        echo "<td>" . $numero . " x " . $i . "</td>";
                        echo "<th>" . ($numero * $i) . "</th>";
                        //echo $numero . " x " . $i . " = " . ($numero * $i) . "</br>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php
        }

        tablaHtmlMultiplicar(5);
        ?>
    </div>
</body>
<!--Incluimos Footer-->
<?php require '../includes/footer.php'; ?>
<script src="../ejer1/ejercicio1.js"></script>

</html>