<!--Iniciamos la sesion-->
<?php session_start();
//Incluimos conexión
include('dbcon.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP POO CRUD</title>
    <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <!--Navegacion-->
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
        <div class="row">
            <!--Mostramos mensaje-->
            <div class="col-md-12 mt-4">
                <!--Código php-->
                <?php if (isset($_SESSION['mensaje'])) : ?>
                    <!--Mesnaje de alerta con el sms guardado-->
                    <h5 class="alert alert-success"><?= $_SESSION['mensaje']; ?></h5>
                <?php
                    unset($_SESSION['mensaje']); //Desarmamos el mensaje
                endif;
                ?><!--Terminamos el if-->

                <!--Menu-->
                <div class="card">
                    <div class="card-header">
                        <h3>PHP PDO CRUD
                            <a href="anadirEstudiante.php" class="btn btn-primary float-end">Añadir Estudiante <img class="mx-2" width="30" height="30" src="https://img.icons8.com/ios/50/add--v1.png" alt="add--v1" /></a>
                        </h3>
                    </div>
                    <!--Creamos una tabla para obtener los resultados-->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <!--Encabezado-->
                            <thead>
                                <!--Fila-->
                                <tr>
                                    <!--Columna-->
                                    <th>ID</th>
                                    <th>Nombre Completo</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Curso</th>
                                    <!--Boton editar-->
                                    <th>Editar</th>
                                    <!--Boton eliminar-->
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <!--Cuerpo tabla-->
                            <tbody>
                                <?php
                                //Conectamos en la BD y lo guardamos
                                $query = "SELECT * FROM estudiantes";
                                $statement = $con->prepare($query);
                                $statement->execute();

                                $statement->setFetchMode(PDO::FETCH_OBJ); //--Cada fila del conjunto de resultados se devuelve como un objeto anónimo 

                                //Traemos el resultado
                                $resultado = $statement->fetchAll();

                                if ($resultado) {
                                    //Recorremos el rray
                                    foreach ($resultado as $fila) {
                                ?>
                                        <tr>
                                            <!--Mostramos los resultados en las filas-->
                                            <td><?= $fila->id; ?></td>
                                            <td><?= $fila->nombreCompleto; ?></td>
                                            <td><?= $fila->email; ?></td>
                                            <td><?= $fila->telefono; ?></td>
                                            <td><?= $fila->curso; ?></td>
                                            <td>
                                                <a href="editarEstudiante.php?id=<?= $fila->id; ?>" class="btn btn-light">Editar <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="17" height="17" viewBox="0 0 40 40">
                                                        <path fill="#f5ce85" d="M5.982 29.309L8.571 26.719 13.618 31.115 10.715 34.019 2.453 37.547z"></path>
                                                        <path fill="#967a44" d="M8.595,27.403l4.291,3.737l-2.457,2.457l-7.026,3.001l3.001-7.003L8.595,27.403 M8.548,26.036 l-2.988,2.988l-4.059,9.474L11,34.44l3.351-3.351L8.548,26.036L8.548,26.036z"></path>
                                                        <path fill="#36404d" d="M3.805 33.13L1.504 38.5 6.888 36.201z"></path>
                                                        <path fill="#f78f8f" d="M30.062,5.215L32.3,2.978C32.931,2.347,33.769,2,34.66,2s1.729,0.347,2.36,0.978 c1.302,1.302,1.302,3.419,0,4.721l-2.237,2.237L30.062,5.215z"></path>
                                                        <path fill="#c74343" d="M34.66,2.5c0.758,0,1.471,0.295,2.007,0.831c1.107,1.107,1.107,2.907,0,4.014l-1.884,1.884 L30.77,5.215l1.884-1.884C33.189,2.795,33.902,2.5,34.66,2.5 M34.66,1.5c-0.982,0-1.965,0.375-2.714,1.124l-2.591,2.591 l5.428,5.428l2.591-2.591c1.499-1.499,1.499-3.929,0-5.428v0C36.625,1.875,35.643,1.5,34.66,1.5L34.66,1.5z"></path>
                                                        <g>
                                                            <path fill="#ffeea3" d="M11.346,33.388c-0.066-0.153-0.157-0.308-0.282-0.454c-0.31-0.363-0.749-0.584-1.31-0.661 c-0.2-1.267-1.206-1.803-1.989-1.964c-0.132-0.864-0.649-1.342-1.201-1.582l21.49-21.503l4.721,4.721L11.346,33.388z"></path>
                                                            <path fill="#ba9b48" d="M28.054,7.931l4.014,4.014L11.431,32.594c-0.242-0.278-0.638-0.59-1.261-0.748 c-0.306-1.078-1.155-1.685-1.983-1.943c-0.151-0.546-0.447-0.968-0.821-1.272L28.054,7.931 M28.053,6.517L5.56,29.023 c0,0,0.007,0,0.021,0c0.197,0,1.715,0.054,1.715,1.731c0,0,1.993,0.062,1.993,1.99c1.982,0,1.71,1.697,1.71,1.697l22.482-22.495 L28.053,6.517L28.053,6.517z"></path>
                                                        </g>
                                                        <g>
                                                            <path fill="#d9e7f5" d="M29.107 4.764H34.685V11.440999999999999H29.107z" transform="rotate(-45.009 31.895 8.103)"></path>
                                                            <path fill="#788b9c" d="M31.507,4.477l4.014,4.014l-3.237,3.237L28.27,7.714L31.507,4.477 M31.507,3.063l-4.651,4.651 l5.428,5.428l4.651-4.651L31.507,3.063L31.507,3.063z"></path>
                                                        </g>
                                                    </svg></a>
                                            </td>
                                            <td>
                                                <form action="valform.php" method="post">
                                                    <button type="submit" name="eliminar_estudiante" class="btn btn-danger" value="<?= $fila->id; ?>"> Eliminar<svg xmlns="http://www.w3.org/2000/svg" x="2px" y="0px" width="17" height="17" viewBox="0 0 48 48">
                                                            <linearGradient id="nyvBozV7VK1PdF3LtMmOna_pre7LivdxKxJ_gr1" x1="18.405" x2="33.814" y1="10.91" y2="43.484" gradientUnits="userSpaceOnUse">
                                                                <stop offset="0" stop-color="#32bdef"></stop>
                                                                <stop offset="1" stop-color="#1ea2e4"></stop>
                                                            </linearGradient>
                                                            <path fill="url(#nyvBozV7VK1PdF3LtMmOna_pre7LivdxKxJ_gr1)" d="M39,10l-2.835,31.181C36.072,42.211,35.208,43,34.174,43H13.826	c-1.034,0-1.898-0.789-1.992-1.819L9,10H39z"></path>
                                                            <path fill="#0176d0" d="M32,7c0-1.105-0.895-2-2-2H18c-1.105,0-2,0.895-2,2c0,0,0,0.634,0,1h16C32,7.634,32,7,32,7z"></path>
                                                            <path fill="#007ad9" d="M7,9.886L7,9.886C7,9.363,7.358,8.912,7.868,8.8C10.173,8.293,16.763,7,24,7s13.827,1.293,16.132,1.8	C40.642,8.912,41,9.363,41,9.886v0C41,10.501,40.501,11,39.886,11H8.114C7.499,11,7,10.501,7,9.886z"></path>
                                                        </svg></button>
                                                </form>
                                                <linearGradient id="nyvBozV7VK1PdF3LtMmOna_pre7LivdxKxJ_gr1" x1="18.405" x2="33.814" y1="10.91" y2="43.484" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0" stop-color="#32bdef"></stop>
                                                    <stop offset="1" stop-color="#1ea2e4"></stop>
                                                </linearGradient>
                                                <path fill="url(#nyvBozV7VK1PdF3LtMmOna_pre7LivdxKxJ_gr1)" d="M39,10l-2.835,31.181C36.072,42.211,35.208,43,34.174,43H13.826	c-1.034,0-1.898-0.789-1.992-1.819L9,10H39z"></path>
                                                <path fill="#0176d0" d="M32,7c0-1.105-0.895-2-2-2H18c-1.105,0-2,0.895-2,2c0,0,0,0.634,0,1h16C32,7.634,32,7,32,7z"></path>
                                                <path fill="#007ad9" d="M7,9.886L7,9.886C7,9.363,7.358,8.912,7.868,8.8C10.173,8.293,16.763,7,24,7s13.827,1.293,16.132,1.8	C40.642,8.912,41,9.363,41,9.886v0C41,10.501,40.501,11,39.886,11H8.114C7.499,11,7,10.501,7,9.886z"></path>
                                                </svg></a>
                                            </td>

                                            <!--Si es con //PDO::FETCH_ASSOC -->
                                            <!--<td><//?= $fila['id']; ?></td>
                                            <td><//?= $fila['nombreCompleto']; ?></td>
                                            <td><//?= $fila['email']; ?></td>
                                            <td><//?= $fila['telefono']; ?></td>
                                            <td><//?= $fila['curso']; ?></td>-->

                                        </tr>
                                    <?php
                                    }
                                } else {
                                    //Mostramos un mesaje de no encontrado
                                    ?>
                                    <tr>
                                        <td colspan="5">Resultados no encontrados</td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <!--Fila-->
                                <tr>
                                    <!--Columna-->
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--JS Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>