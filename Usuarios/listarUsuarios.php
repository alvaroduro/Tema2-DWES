<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de Datos con PHP y PDO</title>
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
    <!--Navegación-->
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
        <h1 class="text-center">Listar Usuarios</h1>
        <a class="navbar-brand fs-5" href="index.php"><img class="mx-2" width="30" height="30" src="https://img.icons8.com/flat-round/50/back--v1.png" alt="back--v1" />Atrás</a>
    </div>

    <!--------------------------------CODIGO PHP-------------------------------------------->
    <?php
    require_once 'config.php';
    //Listar Usuarios con tabla
    //Mensaje que indica al usuario si se realizao correctamente o no la consulta
    $msgresultado = "";

    //Generamos el listado de usuarios
    try {

        //Conectamos en la BD y lo guardamos
        $query = "SELECT * FROM usuarios";
        $resultado = $conexion->prepare($query);
        $resultado->execute();

        //Si hay datos en la consulta
        if ($resultado) {
            $msgresultado = '<div class="alert alert-success mx-2">' . "La consulta se realizó correctamente!!" . '<img width="50" height="50" src="https://img.icons8.com/clouds/100/ok-hand.png" alt="ok-hand"/></div>';
        } //o no
    } catch (PDOException $ex) {
        $msgresultado = '<div class="alert alert-danger w-100 mx-2">' . "Fallo al realizar al consulta a la Base de Datos!!" . '<img class="mx-2" width="40" height="40" src="https://img.icons8.com/cute-clipart/64/error.png" alt="error"/></div>';
        //die();
    }

    ?>
    <!--PRINCIPAL-->
    <div class="container">
        <!--Titulo-->
        <div class="container-fluid my-5 titulo text-center">
            <img id="imgPrincipal" src="img/principal.jpg" alt="principal">
            <p>
            <h2>Base de Datos de Usuarios</h2>
            </p>
        </div><!--Fin Titulo-->
    </div>

    <!--Mostramos mensaje sobre la consulta-->
    <?php echo "</br>" . $msgresultado; ?>
    <!--Creamos tabla para la -->
    <table class="table table-striped tablaListar w-75">
        <th colspan="5" class="text-center fs-3">TABLA USUARIOS</th>
        <!--Fila-->
        <tr>
            <!--Columnas Encabezados-->
            <th class="text-center">Nombre</th>
            <!--<th>Password</th>-->
            <th class="text-center">Email</th>
            <th class="text-center">Foto</th>
            <th class="text-center">Operaciones</th>
        </tr>
        <?php
        //Insertamos los datos traidos
        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
            //Mostramos los datos en la tabla
            echo '<tr>';
            echo '<td class="text-center">' . $fila['nombre'] . '</td>';
            //echo '<td>' . $fila['password'] . '</td>';
            echo '<td class="text-center">' . $fila['email'] . '</td>';
            echo '<td class="text-center">';
            //Comprobamos si la imagen está vacía
            if ($fila['imagen'] != null) {
                //En caso de no ser nula guardamos la foto en la ruta
                echo '<img src="img/' . $fila['imagen'] . '" width="30" height="30" />' . $fila['imagen'];
            } else {
                echo "---";
            }
            echo '</td>';

            //Insertamos una columna para actualizar datos
            echo '<td class="text-center">' . '<a class="btn btn-secondary mx-2" href="actuser.php?id=' . $fila['id'] . '">Editar<img class="mx-2" width="30" height="30" src="https://img.icons8.com/clouds/100/edit.png" alt="edit"></a>' .
                '<a class="btn btn-danger" href="deluser.php?id=' . $fila['id'] . '">Eliminar<img class="mx-2" width="30" height="30" src="https://img.icons8.com/clouds/100/edit.png" alt="edit"></a>' . '</td>';

            echo '</tr>';
        }

        ?>
    </table>

    <!--JS BOOSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>