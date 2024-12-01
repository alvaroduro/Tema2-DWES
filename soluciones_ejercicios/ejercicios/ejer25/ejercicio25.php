<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 25</title>
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
        <h1>Ejercicio 24</h1>
        <?php require '../includes/nav.php'; ?>
        <h3 class="titulo_ejercicio fst-italic">Recoge los datos de las variables POST y muéstralos por pantalla en
            el caso de que existan y no estén vacíos.

        </h3>
        <!--Botones-->
        <div class="container botones d-flex my-5">
            <button type="button" class="btn btn-success mx-4 btnAbrir" onclick="mostrarDiv()">Abrir Ejercicio</button>
            <button type="button" class="btn btn-success btncerrar" onclick="ocultarDiv()">Cerrar Ejercicio</button>
        </div>

        <!--Div soluciones-->
        <div class="container text-center my-5 border border-primary w-100 fs-6" id="solucionEjer">
            <h4>Solución Ejercicio</h4>

            <!--Formulario-->
            <form method="post" action="">
                <div class="mb-3" class="form-group">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre">
                </div>
                <div class="mb-3" class="form-group">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="apellidos">
                </div>
                <div class="mb-3" class="form-group">
                    <label for="bio" class="form-label">Biografía</label>
                    <textarea class="form-control" name="bio" placeholder="Comentarios" id="bio" rows="2" resize=none></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Introduce email">
                    <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su email.</small>
                </div>
                <div class="mb-3" class="form-group mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group mb-3">
                    <label for="imagen" class="form-label">Añadir una imagen</label>
                    <input type="file" class="form-control-file" id="imagen" name="imagen">
                </div>
                <button class="btn btn-primary mb-3" type="submit" class="btn btn-primary" value="enviar" name="enviar">Enviar</button>
            </form>
        </div>

        <?php
        //Si se pulsa en el boton enviar
        if (isset($_POST['enviar'])) {
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $bio = $_POST['bio'];
            $email = $_POST['email'];
            $password = sha1($_POST['password']);
            $imagen = "La imagen nos ha llegado";

            //Guardamos los datos en variables
            if (
                !empty($_POST['nombre']) || !empty($_POST['apellidos'])
                || !empty($_POST['bio']) || !empty($_POST['email'])
                || !empty($_POST['password']) || !empty($_FILES["imagen"]["tmp_name"])
            ) {
                echo "Nombre: <b>".$nombre."</b></br>";
                echo "Apellidos: <b>".$apellidos."</b></br>";
                echo "Biografía: <b>".$bio."</b></br>";
                echo "Email: <b>".$email."</b></br>";
                echo "Contraseña: <b>".$password."</b></br>";
                echo "Imagen: <b>".$imagen."</b></br>";
            } else {
                echo "<div class='alert alert-danger' style='margin-top:5px;'>Hay campos vacíos</div>";
            }
        }
        ?>
</body>
<!--Incluimos Footer-->
<?php require '../includes/footer.php'; ?>
<script src="../ejer1/ejercicio1.js"></script>

</html>