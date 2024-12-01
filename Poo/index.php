<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        * {
            font-family: "Mukta", serif;
            font-size: 20px;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">INICIO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
    <div class="container">
        <h1>POO</h1>
        <div class="container-fluid">
            <p>Clases de Objetos: <b>Class</b><br>
                Se distribuye en ATRIBUTOS Y METODOS <br>
                Por ejemplo, la <b>clase</b> tendría como atributos características como
                las dimensiones, color, contenido, etc. Las funciones o métodos que
                incorpora serían las funcionalidades que deseamos que realice la caja,
                como: introduce_objeto(), muestra_contenido(), vacíate(),...</p>
        </div>
        <?php
        class Caja
        {
            //Atributos o propiedades
            var $alto;
            var $ancho;
            var $largo;
            var $contenido;
            var $color;

            //Funciones o Métodos
            function introduce($cosa)
            {
                $this->contenido = $cosa;
            }
            function muestra_contenido()
            {
                echo $this->contenido;
            }
        }



        ?>
    </div>
</body>

</html>