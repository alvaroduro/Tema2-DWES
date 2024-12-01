<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 17</title>
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
        <h1>Ejercicio 17</h1>
        <?php require '../includes/nav.php'; ?>
        <h3 class="titulo_ejercicio fst-italic">Crea un array con el contenido de la siguiente tabla:
            Frutas-- Deportes-- Idiomas--
            *Manzana *Futbol* *Español
            *Naranja *Tenis *Inglés
            *Sandia *Baloncesto *Francés
            *Fresa *Beisbol *Italiano
            Recórrelo y muestra la tabla en HTML con el contenido del array.</h3>
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
        //Variables
        $array = [
            "Frutas" => ["Manzana", "Naranja", "Sandia", "Fresa"],
            "Deportes" => ["Futbol", "Tenis", "Baloncesto", "Beisbol"],
            "Idiomas" => ["Español", "Inglés", "Francés", "Italiano"]
        ];
        $encabezados = array_keys($array); //Creamos un array con los encabezados
        $numFilas = count($array[$encabezados[0]]); //numero de elementos por categoria
        ?>

        <!--Tabla-->
        <table class="table table-striped">
            <thead>
                <tr>
                    <?php
                    // Generar los encabezados de la tabla
                    for ($i = 0; $i < count($encabezados); $i++) {
                        echo "<th>" . $encabezados[$i] . "</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                // Generar las filas y columnas
                for ($fila = 0; $fila < $numFilas; $fila++) {
                    echo "<tr>";
                    for ($columna = 0; $columna < count($encabezados); $columna++) {
                        echo "<td>" . $array[$encabezados[$columna]][$fila] . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<!--Incluimos Footer-->
<?php require '../includes/footer.php'; ?>
<script src="../ejer1/ejercicio1.js"></script>

</html>