<?php
//Añadir Usuarios
//Requerimos conexión
require_once 'config.php';

//Mensaje de confirmación
$msgresultado = "";
$msgresultadoimg = "";

//Array asociativo con los posibles errores en cada campos
$errores = array();

//Si se pulsa en Guardar
if (isset($_POST['guardar'])) {
    //Vemos que los campos no están vacíos
    if (isset($_POST) && (!empty($_POST))) {
        $nombre = $_POST['txtnombre'];
        $password = sha1($_POST['txtpass']);
        $email = $_POST['txtemail'];

        //Tratamos la imagen -Definimos su variable a null
        //En caso de almacenar la img en la BD
        $imagen = NULL;

        //Comprobamos que el campo tmp_name tiene una valor asignado
        //Y que hemos recibido la img correctamente
        if (isset($_FILES['imagen']) && (!empty($_FILES['imagen']['tmp_name']))) {
            //Comprobamos si existe el directorio img(si no, lo creamos)
            if (!is_dir("img")) {
                $imgDire = "directorio mal";
                $dir = mkdir("img", 0777, true);
            } else { //Si no, ponemos directorio a true
                $dir = true;
                $imgDire = "directorio bien";
            }

            //Verificamos que la carpeta de fotos existe y movemos el fichero a ella
            if ($dir) {
                //Aseguramos nombre único
                $nombreImg = time() . "-" . $_FILES['imagen']['name'];

                //Movemos el archivo a nuestra carpeta
                $moverImg = move_uploaded_file($_FILES['imagen']['tmp_name'], "img/" . $nombreImg);
                $imagen = $nombreImg;

                //Verificamos la carga si se ha realizado correctamente
                if ($moverImg) { //En caso de que se haya movido bien
                    $imagenCargada = true;
                    $msgresultadoimg = '<div class="alert alert-success mx-2">' . "cargada bien!!" . '<img width="50" height="50" src="https://img.icons8.com/clouds/100/ok-hand.png" alt="ok-hand"/></div>';
                } else {
                    $imagenCargada = false;
                    $errores["imagen"] = "Error al cargar la imagen" . '<img width="30" height="30" src="https://img.icons8.com/bubbles/100/error.png" alt="error"/>';
                    $msgresultadoimg = '<div class="alert alert-success mx-2">' . "Error img no cargada!!" . '<img width="50" height="50" src="https://img.icons8.com/clouds/100/ok-hand.png" alt="ok-hand"/></div>';
                }
            }
        } else {
            $msgresultadoimg = '<div class="alert alert-success mx-2">' . "Error img vacía o no recibida!!" . '<img width="50" height="50" src="https://img.icons8.com/clouds/100/ok-hand.png" alt="ok-hand"/></div>';
        }

        //Si no hay errores
        if (count($errores) == 0) {
            $msgresultadoimg = '<div class="alert alert-success mx-2">' . "Si no  hay errores!!" . '<img width="50" height="50" src="https://img.icons8.com/clouds/100/ok-hand.png" alt="ok-hand"/></div>';
            //Definimos la instruccion sql
            try {
                $sql = "INSERT INTO usuarios(nombre, password, email, imagen) 
                VALUES (:nombre,:password,:email,:imagen)";

                //Preparamos la consulta
                $query = $conexion->prepare($sql);

                //Ejecutamos indicando los valores de los parámetros
                $query->execute([
                    'nombre' => $nombre,
                    'password' => $password,
                    'email' => $email,
                    'imagen' => $imagen,
                ]);

                //Comprobamos que se ha realizado correctamente
                if ($query) {
                    $msgresultado = '<div class="alert alert-success mx-2">' . "El usuario se registró correctamente!!" . '<img width="50" height="50" src="https://img.icons8.com/clouds/100/ok-hand.png" alt="ok-hand"/></div>';
                } // o no

            } catch (PDOException $ex) {
                $msgresultado = '<div class="alert alert-danger w-100 mx-2">' . "Fallo al insertar usuario a la Base de Datos!!" . '<img class="mx-2" width="40" height="40" src="https://img.icons8.com/cute-clipart/64/error.png" alt="error"/></div>';
                die();
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Usuario</title>
    <!--CSS-->
    <link rel="stylesheet" href="estilos.css">
    <!--GoogleFont-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!--Favicon-->
    <link rel="icon" href="img/phpFavi.png" type="image/x-icon">
    <!--CDN BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        * {
            font-family: "Mukta", serif;

        }
    </style>
</head>

<body>
    <!--NAVEGACION-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="../index.php">INICIO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../Poo/index.php">POO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../PDO/index.php">PDO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../PhpPdoCrud/index.php">CRUD TUTORIAL</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--TITULO PRINCIPAL-->
    <div class="container d-flex justify-content-between my-3">
        <h1 class="text-center">Añadir Usuarios</h1>
        <a class="navbar-brand fs-5" href="index.php"><img class="mx-2" width="30" height="30" src="https://img.icons8.com/flat-round/50/back--v1.png" alt="back--v1" />Atrás</a>
    </div>

    <!--PRINCIPAL-->
    <div class="container">
        <!--Titulo-->
        <div class="container-fluid my-5 titulo text-center">
            <img id="imgPrincipal" src="img/principal.jpg" alt="principal">
            <p>
            <h2>Base de Datos de Usuarios</h2>
            </p>
        </div><!--Fin Titulo-->

        <!--Mostramos si se inserto correctamente-->
        <?php echo $msgresultado ?>

        <!--Formulario-->
        <div class="formulario my-2">
            <form action="adduser.php" method="post" enctype="multipart/form-data">
                <label for="txtnombre">Nombre</label>
                <input type="text" class="form-control" name="txtnombre" required></br>
                <label for="txtemail">Email</label>
                <input type="text" class="form-control" name="txtemail"></br>
                <label for="txtpass">Password</label>
                <input type="text" class="form-control" name="txtpass" required></br>
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" class="form-control"><br />
                <input type="submit" value="Guardar" class="btn btn-success" name="guardar">
            </form>
        </div>
    </div>

    <!--JS BOOSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>