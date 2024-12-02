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
    <h1 class="text-center my-3">CRUD USUARIOS Apuntes</h1>
    <?php require_once 'config.php';?> 
    <!--PRINCIPAL-->
    <div class="container">
        <!--Titulo-->
        <div class="container-fluid my-5 titulo text-center">
            <img id="imgPrincipal" src="img/principal.jpg" alt="principal">
            <p>
            <h2>Base de Datos de Usuarios</h2>
            </p>
        </div><!--Fin Titulo-->
        <!--Enlaces-->
        <div class="container my-3 enlacesPrincipal">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#"><img class="mx-2" width="80" height="80" src="https://img.icons8.com/clouds/100/right.png" alt="right" />Listar Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img class="mx-2" width="80" height="80" src="https://img.icons8.com/bubbles/100/right.png" alt="right" />Añadir Usuario</a>
                </li>
            </ul>
        </div>
    </div>
    <!--JS BOOSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>