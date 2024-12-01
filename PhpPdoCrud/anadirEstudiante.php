<!--Hacemos conexión para traernos los datos-->
<?php
//Incluimos conexión
include('dbcon.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Datos en BD uso PHP PDO</title>
    <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <!--Navegación-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
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
                </ul>
            </div>
        </div>
    </nav>
    <!--Principal-->
    <div class="container">
        <!--Fila-->
        <div class="row">
            <!--Columna-->
            <div class="col-md-12 mt-4">

                <!--Menu-->
                <div class="card">
                    <div class="card-header">
                        <h3>Añadir Datos en BD uso PHP PDO
                            <a href="index.php" class="btn btn-danger float-end"><img class="mx-1" width="20" height="20" src="https://img.icons8.com/glyph-neue/64/back.png" alt="back" />Atrás </a>
                        </h3>
                    </div>
                    <!--Formulario añadir Estudiante-->
                    <div class="card-body">
                        <!--Formulario que envia a valform.php-->
                        <form action="valform.php" method="POST">
                            <!--Campo nombre completo-->
                            <div class="mb-3">
                                <label for="nombreCompleto">Nombre Completo</label>
                                <input type="text" name="nombreCompleto" class="form-control" />
                            </div>
                            <!--Campo email-->
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" />
                            </div>
                            <!--Campo telefono-->
                            <div class="mb-3">
                                <label for="telefono">Teléfono</label>
                                <input type="text" name="telefono" class="form-control" />
                            </div>
                            <!--Campo curso-->
                            <div class="mb-3">
                                <label for="curso">Curso</label>
                                <input type="text" name="curso" class="form-control" />
                            </div>
                            <!--Boton-->
                            <div class="mb-3">
                                <button type="submit" name="guardar_estudiante" class="btn btn-success">Guardar Estudiante </button>
                            </div>
                        </form>
                    </div> <!--Fin formulario añadir Estudiante-->
                </div><!--Fin Menu-->
            </div><!--Fin - Columna-->
        </div><!--Fin - Fila-->
    </div><!--Fin - Principal-->

    <!--JS Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>