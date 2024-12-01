<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 27</title>
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
        <h1>Ejercicio 27</h1>
        <?php require '../includes/nav.php'; ?>
        <h5 class="titulo_ejercicio fst-italic">Conéctate a una base de datos MySQL y crea la siguiente tabla
            usuarios con los mismos campos que el formulario anterior.
        </h5>
        <!--Botones-->
        <div class="container botones d-flex my-5">
            <button type="button" class="btn btn-success mx-4 btnAbrir" onclick="mostrarDiv()">Abrir Ejercicio</button>
            <button type="button" class="btn btn-success btncerrar" onclick="ocultarDiv()">Cerrar Ejercicio</button>
        </div>

        <?php
        //Si se pulsa en el boton enviar
        if (isset($_POST['enviar'])) {

            //Comprobamos y validamos los campos
            //Nombre
            if (
                strlen($_POST['nombre']) < 20 && //Los caracteres son menores de 20
                (!empty($_POST['nombre'])) && //Si el campo nombre no está vacío  
                (preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $_POST['nombre'])) //&& //Expresion regular  
            ) {
                $nombre = htmlspecialchars(trim($_POST['nombre'])); //Guardamos en una variable
                echo  "Nombre: <b>" . $nombre . "</b><br/>";
            } else {
                echo $_POST['nombre'] . "<br/>";
                echo "(nombre)No puede estar vacío ni contener mas de 20 caracteres, tampoco debe contener números<br/>";
            }
            //Apellidos
            if (
                !empty($_POST['apellidos']) && //Si el campo nombre no está vacío  
                (preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $_POST['apellidos'])) //Expresion regular  
            ) {
                $apellidos = htmlspecialchars(trim($_POST['apellidos'])); //Guardamos en una variable
                echo  "Apellidos:<b>" . $apellidos . "</b><br/>";
            } else {
                echo "(apellidos)No puede estar vacío ni contener mas de 20 caracteres, tampoco debe contener números<br/>";
            }

            //Campo Biografia
            if (!empty($_POST["bio"])) {
                $bio = $_POST["bio"];
                $bio = htmlspecialchars(trim($bio)); // Eliminamos espacios en blanco 
                $bio = stripslashes($bio); //Elimina barras invertidas 
                echo  "Biografía: <b>" . $bio . "</b><br/>";
            } else {
                echo "La biografía no puede esta vacía :(<br/>";
            }

            //Campo Email
            if (
                !empty($_POST["email"])
                && (preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/", $_POST["email"]))
            ) {
                $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo  "Email: <b>" . $email . "</b><br/>";
                }
            } else {
                echo "La dirección email introducida no es válida :(<br/>";
            }

            //Campo Imagen
            if (isset($_FILES['imagen']) && !empty($_FILES['imagen']['tmp_name'])) {

                //Verificamos el formato 
                $imagen = $_FILES['imagen'];
                $extensionesPermitidas = ['image/jpeg', 'image/png', 'image/gif'];
                if (!in_array($imagen['type'], $extensionesPermitidas)) {
                    echo "La imagen debe ser un archivo válido (JPG, PNG o GIF).";
                } else {
                    echo  "Fotografía:" . "La imagen nos ha llegado ;)";
                }

                var_dump($_FILES['imagen']); //Guardamos el array de img
                /*array (size=5)
                'name' => string 'Comunidad trasteros 17.png' (length=26)
                'type' => string 'image/png' (length=9)
                'tmp_name' => string 'C:\wamp64\tmp\php942F.tmp' (length=25)
                'error' => int 0
                'size' => int 11930*/
            } else {
                echo "Seleccione una imagen válida :(";
            }

            //Campo Password
            // if (
            // !empty($_POST["password"]) && (htmlspecialchars(strlen($_POST["password"])) > 6)
            // ) {
            //     $password = sha1($_POST['password']);
            //     echo  "Contraseña: <b>" . sha1($_POST["password"]) . "</b><br/>";
            // } else {
            //     echo "Introduzca una contraseña válida (más de 6 caracteres) :(<br/>";
            // }

            // //Campo Imagen
            // if (isset($_FILES["imagen"]) && !empty($_FILES["imagen"]["tmp_name"])) {
            //     echo  "Fotografía:" . "La imagen nos ha llegado ;)<br/>";
            // } else {
            //     echo "Seleccione una imagen válida :(<br/>";
            //     var_dump(isset($_FILES["imagen"]));
            //     var_dump(!empty($_FILES["imagen"]["tmp_name"]));
            // }

        } else {
            echo "todavia no se ha pulsado el boton<br/>";
        }

        ?>
        <!--Div soluciones-->
        <div class="container text-center my-5 border border-primary w-100 fs-6" id="solucionEjer">
            <h4>Solución Ejercicio</h4>

            <!--Formulario-->
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3" class="form-group">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre"
                        name="nombre" placeholder="nombre">
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
                    <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control">
                </div>
                <button class="btn btn-primary mb-3" type="submit" class="btn btn-primary" value="enviar" name="enviar">Enviar</button>
            </form>
        </div>

</body>
<!--Incluimos Footer-->
<?php require '../includes/footer.php'; ?>
<script src="../ejer1/ejercicio1.js"></script>

</html>