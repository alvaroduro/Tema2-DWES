<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 24</title>
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
        <h3 class="titulo_ejercicio fst-italic">Crea un formulario HTML con los siguientes campos:
            - Nombre
            - Apellidos
            - Biografía
            - Email
            - Contraseña
            - Imagen
        </h3>

            <!--Botones-->
            <div class="container botones d-flex my-5">
                <button type="button" class="btn btn-success mx-4 btnAbrir" onclick="mostrarDiv()">Abrir Ejercicio</button>
                <button type="button" class="btn btn-success btncerrar" onclick="ocultarDiv()">Cerrar Ejercicio</button>
            </div>

            <!--Div soluciones-->
            <div class="container text-center my-5 border border-primary w-50 fs-6" id="solucionEjer">
                <h4>Solución Ejercicio</h4>

                <form>
                    <div class="mb-3" class="form-group">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="nombre">
                    </div>
                    <div class="mb-3" class="form-group">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" placeholder="apellidos">
                    </div>
                    <div class="mb-3" class="form-group">
                        <label for="bio" class="form-label">Biografía</label>
                        <textarea class="form-control" placeholder="Comentarios" id="bio" rows="2" resize=none></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Introduce email">
                        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su email.</small>
                    </div>
                    <div class="mb-3" class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button class="btn btn-primary mb-3" type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
</body>
<!--Incluimos Footer-->
<?php require '../includes/footer.php'; ?>
<script src="../ejer1/ejercicio1.js"></script>

</html>