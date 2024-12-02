<?php
//Añadir Usuarios
//Requerimos conexión
require_once 'config.php';

//Mensaje de confirmación
$msgresultado = "";

//Variables actualizar
$valnombre = "";
$valemail = "";

//Si se pulsa en Actualizar
if (isset($_POST['actualizar'])) {

    //guardamos el id
    $id = $_POST['id']; //Lo recibimos por el campo oculto

    //Vemos que los campos no están vacíos
    $nuevonombre = $_POST['txtnombre'];
    $nuevoemail = $_POST['txtemail'];

    //Definimos la instruccion sql
    try {
        $sql = "UPDATE usuarios SET nombre=:nombre, email=:email WHERE id=:id";

        //Preparamos la consulta
        $query = $conexion->prepare($sql);

        //Ejecutamos indicando los valores de los parámetros
        $query->execute(['id' => $id, 'nombre' => $nuevonombre, 'email' => $nuevoemail]);

        //Comprobamos que se ha realizado correctamente
        if ($query) {
            $msgresultado = '<div class="alert alert-success mx-2">' . "El usuario se actualizado correctamente!!" . '<img width="50" height="50" src="https://img.icons8.com/clouds/100/ok-hand.png" alt="ok-hand"/></div>';
        } // o no

    } catch (PDOException $ex) {
        $msgresultado = '<div class="alert alert-danger w-100 mx-2">' . "Fallo al actualizar usuario a la Base de Datos!!<br/>" . $ex->getMessage(). '<img class="mx-2" width="40" height="40" src="https://img.icons8.com/cute-clipart/64/error.png" alt="error"/></div>';
        //die();
    }

    //Obtenemos los valores para ponerlos en los campos
    $valnombre = $nuevonombre;
    $valemail = $nuevoemail;
} else {
    //Vamos a rellenar los campos
    if (isset($_GET['id']) && (is_numeric($_GET['id']))) { //Si tenemos el id y es número
        //Almacenamos el id
        $id = $_GET['id'];

        //Nos traemos los datos de la BD
        try {

            //Conectamos en la BD y lo guardamos
            $query = "SELECT * FROM usuarios WHERE id=:id";
            $resultado = $conexion->prepare($query);
            $resultado->execute(['id' => $id]);

            //Si hay datos en la consulta
            if ($resultado) {
                $msgresultado = '<div class="alert alert-success mx-2">' . "Los datos se obtuvieron correctamente!!" . '<img width="50" height="50" src="https://img.icons8.com/clouds/100/ok-hand.png" alt="ok-hand"/></div>';

                //Insertamos los datos traidos
                $fila = $resultado->fetch(PDO::FETCH_ASSOC);
                //Guardamos en las variables
                $valnombre = $fila['nombre'];
                $valemail = $fila['email'];
            }
        } catch (PDOException $ex) {
            $msgresultado = '<div class="alert alert-danger w-100 mx-2">' . "Los datos no se obtuvieron correctamente!!</br>" . $ex->getMessage() . '<img class="mx-2" width="40" height="40" src="https://img.icons8.com/cute-clipart/64/error.png" alt="error"/></div>';
            //die();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
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
        <h1 class="text-center">Actualizar Usuarios</h1>
        <a class="navbar-brand fs-5" href="index.php"><img class="mx-2" width="30" height="30" src="https://img.icons8.com/flat-round/50/back--v1.png" alt="back--v1" />Atrás</a>
    </div>

    <!--PRINCIPAL-->
    <div class="container">
        <!--Titulo-->
        <div class="container-fluid my-5 titulo text-center bg-primary-subtle">
            <img id="imgPrincipal" src="img/principal.jpg" alt="principal">
            <p>
            <h2>Base de Datos de Usuarios</h2>
            </p>
        </div><!--Fin Titulo-->

        <!--Mostramos si se inserto correctamente-->
        <?php echo $msgresultado ?>

        <!--Formulario-->
        <div class="formulario my-2">
            <form action="actuser.php" method="post">
                <label for="txtnombre">Nombre</label>
                <input type="text" class="form-control" name="txtnombre" required value="<?php echo $valnombre ?>"></br>
                <label for="txtemail">Email</label>
                <input type="text" class="form-control" name="txtemail" value="<?php echo $valemail ?>"></br>
                <label for="txtpass">Password</label>
                <input type="text" class="form-control" name="txtpass" disabled></br>
                <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>"></br>
                <input type="submit" value="Actualizar" class="btn btn-success" name="actualizar">
            </form>
        </div>
    </div>

    <!--JS BOOSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>