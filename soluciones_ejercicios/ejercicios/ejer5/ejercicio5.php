<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
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
        <h1>Ejercicio 5</h1>
        <?php require '../includes/nav.php'; ?>
        <h3 class="titulo_ejercicio fst-italic">Imprimir por pantalla la tabla de multiplicar del número pasado en un 
parámetro GET por la URL. 

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
        //si el número ha sido pasado por la URL
        if(isset($_GET['numero'])) {
            $numero = (int)$_GET['numero'];

            //Comprobamos el número
            if($numero <=0) {
                echo "El número <b>$numero</b> no puede ser negativo ni 0.";
            }else {
                echo "<h3>Tabla de multiplicar del $numero</h3>";
                //Recorremos el número y su tabla de multiplicar
                for ($i=1; $i <= 10; $i++) { 
                    $resultado = $numero * $i;
                    echo "$numero x $i = <b>$resultado</b></br>";
                }
            }
        }
        ?>
    </div>
</body>
<!--Incluimos Footer-->
<?php require '../includes/footer.php'; ?>
<script src="../ejer1/ejercicio1.js"></script>

</html>