<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: "Mukta", serif;
            font-size: 17px;
            background-color: #fcf3cf;
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
          <a class="nav-link active" aria-current="page" href="../Poo/index.php">POO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../PDO/index.php">PDO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../PHP PDO CRUD Tutorial (ingles)/index.php">CRUD TUTORIAL</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container">
        <h1>Acceso a Base de Datos con PDO</h1>
        <h2>PHP DATA OBJECT (PDO)</h2>
        <p>Conocer los controladores (imprimos array drivers) de nuestro servidor:</p>
        <div class="container border border-primary w-50">
            <?php print_r(PDO::getAvailableDrivers()) //Devuelve array drivers
            ?>
        </div>

        <p>PDO se divide en:
        <ul>
            <li><b>PDO</b> - Conexion transacciones.</li>
            <li><b>PDOStatement</b> -- Sentencias SQL.</li>
            <li><b>PDOException</b> -- Maneja errores</li>
        </ul>
        </p>

        <h2>Conectar una BD con PDO</h2>
        <p>Para ello debemos crear una instancia de la clase <b>PDO</b>.</p>
        <div class="container-fluid border border-primary">
            <p>Argumentos Necesarios:
            <ul>
                <li><b>Tipo BD</b> - MYSQL.</li>
                <li><b>Nombre IP del host</b> -- localhost o 127.0.0.1.</li>
                <li><b>Nombre BD</b> -- tambien el puerto</li>
                <li><b>Usuario</b> -- root (por defecto)</li>
                <li><b>Contraseña</b> </li>
            </ul>
            <b>$conex</b>= newPDO(’mysql:host=127.0.0.1;dbname=_prueba’, ’root’, ’’);</p>
        </div>
        <?php
        //Conexion a la BD
        //$conex = new PDO('mysql:host=127.0.0.1;dbname=_prueba', 'root', '');
        ?>
        <h3>$conex</h3>
        <p>- Es un Objeto, no mouestra el valor. Sólo comprobamos los errores con un try-catch [Mostramo el error al introducir o no conectarnos a la BD]</p>
        <?php
        //Controlamos los errores
        /**try {
            $conex = new PDO('mysql:host=127.0.0.1;dbname=_prueba', 'root', '');
        } catch (Exception $e) {
            die('Error : ' . $e->GetMessage());
        }*/
        ?>
        <!--CONEXION-->
        <div class="container-fluid border border-primary">
            <p><b>try {
                    $conex = new PDO('mysql:host=127.0.0.1;dbname=_prueba', 'root', '');
                    } catch (Exception $e) {
                    die('Error : ' . $e->GetMessage());
                    }</b></p>
        </div>
        <p> ++ La función <b>die()</b> equivale a la función <b>exit()</b>, es decir,
            terminael scriptactual mostrando un mensaje</p>
        <h3>Recuperar errores durante la conexión - activar el modo activaciónde excepciones PDO:</h3>
        <p>$conex->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);</p>
        <!--Bloque TRY-CATCH-->
        <div class="conatiner border border-success text-center">
            <p>Utilizamos el metodo completo con el <b>Finally:</b></p>

            <p><i>try</i> {<br>
                <b>$conex</b> = new PDO('mysql:host=127.0.0.1;dbname=_prueba’, 'root', '');<br>
                <b>$conex</b>->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );<br>
                echo "La conexión se realizó correctamente!! :)";<br>
                } <i>catch</i>(Exception $e) {<br> echo "Error : '' . $e->GetMessage(); <br>
                } <i>finally</i> { $base = null; } //cierre de la conexión
            </p>
        </div>
        <!--Excepciones-->
        <div class="container my-2">
            <h3 class="text-center border-bottom border-danger">Excepciones</h3>
            <button id="btnToggle" class="btn btn-success">Mostrar Excepciones</button>
            <div id="miDiv" class="container border border-success">
                <p>Pdo maneja los errores en forma de <b>Excepciones.</b></p>
                <p>Utilizamos el atributo <b>error mode</b> para especifica el error</p>
                <p class="border border-danger p-2"><b>$conex</b>->setAttribute(PDO::ATTR_ERRMODE,PDO:: ERRMODE_SILENT) - por defecto;<br>
                    <b>$conex</b>->setAttribute(PDO::ATTR_ERRMODE,PDO:: ERRMODE_WARNING)- emite sms warnig;<br>
                    <b>$conex</b>->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION) - lanzará una excepción PDOException;
                </p>
            </div>
        </div>
        <!--Sentencias Preparadas-->
        <div class="container">
            <h2 class="bg-info bg-opacity-10 border border-info border-start-0 rounded-end mt-5">Sentencias Preparadas (BIND)</h2>
            <ul>
                <li>Mediante el empleo de una <b>sentencia preparada</b>, la aplicación evita
                    repetir el ciclo de análisis/compilación/optimización</li>
                <li>Los parámetros enlazados <b>(bind)</b> minimizan el ancho de banda
                    consumido por el servidor ya que sólo se necesita enviar los parámetros
                    cada vez, no la consultaentera.</li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"> <b>Preparación (->prepare())</b>. Se crea una plantilla de instrucción SQL y se
                    envía a la base de datos.</li>
                <li class="list-group-item"><b>Vinculación (->bind_param())</b>. Se revisan los tipos de datos de cada
                    parámetro.</li>
                <li class="list-group-item"><b>Ejecución (->execute())</b>. Por último, la aplicación enlaza valores con los
                    parámetros, y la base de datos ejecuta la sentencia.</li>
            </ul>
            <p class="my-2"> <b>++ </b>En la definición de la plantilla de la instrucción incluiremos un interrogante <b>(?)</b> o
                un nombre de variable precedido de <b>':'</b> donde queramos aplicar el valor de un
                parámetro.<br>
                <b>++ </b> La función bindParam() nos permite enlazar los parámetros con la consulta
                SQLy le indica a la base de datos su correspondencia. <br>
                <b>++ </b> El métodoque permite prepararuna consultaSQL de tipo <b>SELECT,UPDATE,
                    DELETE o INSERT es prepare():</b>, tras lo cual se vinculan los parámetros
                (bindParam())y,finalmente se ejecuta lasentencia (execute()):
            </p>
            <!--Preparacion Sentencia-->
            <div class="card-header">
                <i>PREPRARACION SENTENCIA</i>
            </div>
            <img class="mx-auto d-block" src="img/PDO1.png" alt="Card image cap">
            <div class="card-body my-3">
                <h4 class="card-title text-center border border-success border-opacity-50">Consultas Preparadas</h4>
            </div>
            <div class="card-footer">
                Una instancia de
                <b>PDOStatement</b> se crea cuando se llama a <b>PDO->prepare()</b>, y con ese objeto
                creado se llama a métodos como <b>bindParam()</b> para pasar valores
                o <b>execute()</b> para ejecutar sentencias.
            </div>
            <!--Preparacion Sentencia-->
            <div class="card-header my-2">
                <i>REGISTRAR DATOS UTILIZANDO PDP PDO</i>
            </div>
            <img class="mx-auto d-block" src="img/PDO2.png" alt="Card image cap">
            <div class="card-body my-3">
                <h4 class="card-title text-center border border-success border-opacity-50">Preparar la consulta</h4>
            </div>
            <div class="card-footer">
                Veamos cómo registrar datos utilizando PDO, suponiendo establecida
                correctamente conexión con una base de datos y que esté referenciada
                con lavariable: <B>$db</B>.
            </div>
            <img class="mx-auto d-block" src="img/PDO3.png" alt="Card image cap">
            <div class="card-body mt-5">
                <h4 class="card-title text-center border border-success border-opacity-50">Si lo hacemos con números</h4>
            </div>
            <div class="card-footer">
                En caso de pasar los parámetros a través de un con <b>execute()</b>, se haría de la misma
                forma que antes:.
            </div>
            <img class="img-fluid mx-auto d-block" src="img/PDO4.png" alt="Card image cap">
            <img class="img-fluid mx-auto d-block" src="img/PDO5.png" alt="Card image cap">
            <!--CONSULTA DATOS UTILIZANDO PDO-->
            <div class="container mt-4 border border-black">
                <h3>CONSULTA DATOS UTILIZANDO PDO</h3>
                <ul>
                    <li>La consulta de datos se realiza mediante <b>PDOStatement::fetch</b> ,
                        que obtiene la siguiente filade un conjunto de resultados.</li>
                    <li><b>@PDO::FETCH_ASSOC</b>: devuelve un array indexado cuyos keys son
                        el nombre de las columnas.</li>
                    <img src="img/PDO6.png" class="img-fluid mx-auto d-block" alt="pdo6">
                    <li><b>@PDO::FETCH_OBJ:</b>devuelve un objeto anónimo con nombres de
                        propiedadesque correspondena las columnas.</li>
                    <img src="img/PDO7.png" class="img-fluid mx-auto d-block" alt="pdo6">
                    <li><B>@PDO::FETCH_BOUND:</B> asigna los valores de las columnas del resultado a
                        sus variables vinculada smediante el método <b>PDOStatement::bindColumn()</b>.</li>
                    <img src="img/PDO7.png" class="img-fluid mx-auto d-block" alt="pdo6">
                    <li><b>@PDO::FETCH_CLASS:</b> asigna los valores de las columnas a propiedades
                        de una clase. Las propiedades del objeto se establecen ANTES de llamar
                        al constructor. Si hay nombres de columnas que no tienen una propiedad
                        creada para cada una, se crean como public.</li>
                    <img src="img/PDO8.png" class="img-fluid mx-auto d-block" alt="pdo6">
                </ul>
            </div>
            <!--Datos con FetchAll-->
            <div class="container-fluid mt-4">
                <h3 class="border border-5">Array Con Todos los Datos</h3>
                <p> ++ Finalmente, para la consulta de datos también se puede emplear
                    directamente <b>PDOStatement::fetchAll()</b>, que devuelve un array con todas las filas
                    devueltas por la base de datos con las que poder iterar. También acepta estilos de
                    devolución: </p>
                <img src="img/PDO9.png" class="img-fluid mx-auto d-block" alt="pdo6">
                <img src="img/PDO10.png" class="img-fluid mx-auto d-block" alt="pdo6">
            </div>
            <!--Eliminar datps con PDO-->
            <h2 class="mt-5 border border-5">ELIMNAR DATOS CON PDO</h2>
            <div>
                <p>Al igual que en el registro y la consulta de datos, para ejecutar una
                    consulta de eliminación se utilizan los métodos <b>prepare() y execute()</b>:</p>
                <img src="img/eliminaPDO.png" class="img-fluid mx-auto d-block" alt="pdo6">
            </div>
            <!--Actualizar datps con PDO-->
            <h2 class="mt-5 border border-5">ACTUALIZAR DATOS CON PDO</h2>
            <div>
                <p>Al igual que en el registro y la consulta de datos, para ejecutar una
                    consulta de actualizacion se utilizan los métodos <b>prepare() y execute()</b>:</p>
                <img src="img/actualizaPDO.png" class="img-fluid mx-auto d-block" alt="pdo6">
            </div>
            <h2 class="mt-5 border border-success rounded-start">USO DE QUERY</h2>
            <div class="mb-3">
                <ul>
                    <li>El método <b>PDO query()</b> ejecuta la sentencia directamente y necesita
                        que se escapen los datos adecuadamente para evitar ataques SQL
                        Injection y otros problemas.</li>
                    <li><b>Execute()</b> ejecuta una sentencia preparada lo que permite enlazar
                        parámetros y evitar tener que escapar los parámetros.
                        execute() tiene un mejor rendimiento si se repite una sentencia múltiples
                        veces, yaque se compila en el servidor de bases de datos sólo una vez.</li>
                    <li>La diferencia en el uso de <b>query()</b> respecto a las sentencias
                        preparadas con prepare() y execute() consistirá en
                        sustituir <b>prepare() por query() y eliminar el execute()</b>:</li>
                </ul>
                <img src="img/queryPDO.png" class="img-fluid mx-auto d-block" alt="pdo6">
            </div>
            <!--Otras funcionalidades con PDO-->
            <h2 class="border border-primary-subtle">Otras Funcionalidades con PDO</h2>
            <div class="container mt-5 d-flex flex-wrap justify-content-center gap-3">
                <div class="card" style="width: 30rem;">
                    <img src="img/PDO11.png" class="card-img-top" alt="pdo11">
                    <div class="card-body">
                        <h5 class="card-title">PDO::exec()</h5>
                        <p class="card-text"> <b>PDO::exec()</b>. Ejecuta una sentencia SQL y devuelve el número de
                            filas afectadas. Devuelve el número de filas modificadas o borradas,
                            **no devuelve resultados de una secuencia SELECT:</p>
                    </div>
                </div>
                <div class="card my-3" style="width: 30rem;">
                    <img src="img/PDO12.png" class="card-img-top" alt="pdo12">
                    <div class="card-body">
                        <h5 class="card-title">PDO::lastInsertId() </h5>
                        <p class="card-text"> <b>PDO::lastInsertId()</b>. Este método devuelve el id autoincrementado del
                            últimoregistroen esa conexión:</p>
                    </div>
                </div>
                <div class="card my-3" style="width: 30rem;">
                    <img src="img/PDO13.png" class="card-img-top" alt="pdo12">
                    <div class="card-body">
                        <h5 class="card-title"> PDOStatement::fetchColumn() </h5>
                        <p class="card-text"> <b>PDOStatement::fetchColumn()</b>. Devuelve una única columna de la
                            siguiente fila de un conjunto de resultados. La columna se indica con un
                            integer, empezando desde cero. Si no se proporciona valor, obtiene la
                            primera columna.</p>
                    </div>
                </div>
                <div class="card my-3" style="width: 30rem;">
                    <img src="img/PDO13.png" class="card-img-top" alt="pdo12">
                    <div class="card-body">
                        <h5 class="card-title"> PDOStatement::fetchColumn() </h5>
                        <p class="card-text"> <b>PDOStatement::fetchColumn()</b>. Devuelve una única columna de la
                            siguiente fila de un conjunto de resultados. La columna se indica con un
                            integer, empezando desde cero. Si no se proporciona valor, obtiene la
                            primera columna.</p>
                    </div>
                </div>
                <div class="card my-3" style="width: 30rem;">
                    <img src="img/PDO14.png" class="card-img-top" alt="pdo12">
                    <div class="card-body">
                        <h5 class="card-title"> PDOStatement::rowCount() </h5>
                        <p class="card-text"><b>PDOStatement::rowCount()</b>. Devuelve el número de filas afectadas por
                            la última sentenciaSQL:</p>
                    </div>
                </div>
            </div>
            <!--Transacciones con PDO-->
            <div class="container border border-bottom-0">
                <h2>TRANSACCIONES CON PDO</h2>
                <ul>
                    <li>
                        Garantizan que cualquier trabajo llevado a cabo en una transacción,
                        incluso si se hace por etapas, sea aplicado a la BD de forma
                        segura, y sin interferencia de otras conexiones, cuando sea confirmado
                        <b>(commit)</b>.
                    </li><br>
                    <li>El trabajo transaccional puede también ser deshecho bajo petición
                        <b>(rollback)</b> siempre y cuando no haya sido ya confirmada, lo que hace más
                        sencillo el <i>manejo de errores</i> en los scripts.
                    </li><br>
                    <li>No todas las bases de datos admiten transacciones, por lo que PDO
                        necesita ejecutarse en el denominado como modo <b>"auto-commit"</b> cuando
                        se establezca por primera vez la conexión. El modo <i>auto-commit</i> significa que,
                        si la base de datos las admite, toda consulta que se ejecute tiene su propia
                        transacción implícita, si la base de datos no las admite, el controlador
                        subyacente lanzará una <b>PDOException</b>.</li><br>
                    <li>Una <i>transacción en PDO</i> comienza con el
                        método <b>PDO::beginTransaction()</b>, que desactiva cualquier otro commit o
                        sentencia SQL no commited hasta que la transacción
                        es committed con <b>PDO::commit()</b>. Cuando se llama este método, todas las
                        acciones que estuvieran pendientes se activan y la conexión a la base de
                        datos vuelve de nuevoa su estado por defecto que es <i>auto-commit</i>.</li><br>
                    <li>Con <b>PDO::rollback()</b> se revierten los cambios realizados durante la
                        transacción.</li>
                </ul>
                <img src="img/PDO15.png" class="img-fluid mx-auto d-block" alt="pdo6">
            </div>
            <!--Procedimientos y funciones almacenadas-->
            <div class="conatainer mt-5 border border-bottom-0">
                <h2>Procedimientos y funciones almacenadas en BD</h2>
                <p> ++ PROCEDIMIENTO ALMACENADO SIN PARÁMETROS</p>
                <img src="img/proceBD.png" class="img-fluid mx-auto d-block" alt="pdo6">
                <p> ++ INVOCAMOS EL PROCEDIMIENTO CON UN <I>SCRIPT</I></p>
                <img src="img/proceBD1.png" class="img-fluid mx-auto d-block" alt="pdo6">
                <!--IN OUT-->
                <h5 class="mt-3">Los procedimientos almacenados pueden tener parámetros IN, IN-OUT y OUT</h5>
                <ul>
                    <li><b>IN</b>:variable de entrada del procedimiento almacenado utilizado en el mismo.</li>
                    <li><b>OUT</b>: variable de salida del procedimiento almacenado. Esta variable se
                        actualiza al final del procedimiento almacenado y se devuelve a PHP.</li>
                    <li><b>IN/OUT</b>:variables deentrada-salida del procedimiento almacenado.</li>
                </ul>
                <!--IN-->
                <h4>PROCEDIMIENTO ALMACENADO CON PARÁMETRO <i>IN</i></h4>
                <img src="img/proceIn.png" class="img-fluid mx-auto d-block" alt="pdo6">
                <p>++ <b>Los parámetros de salida</b> se emplean típicamente para recuperar
                    valores calculados u obtenidos dentro de procedimientos almacenados.</p>
                <img src="img/proceIn1.png" class="img-fluid mx-auto d-block" alt="pdo6">
                <!--OUT-->
                <h4 class="mt-3">PROCEDIMIENTO ALMACENADO CON PARÁMETRO <i>OUT</i></h4>
                <p>++ <b>Los parámetros de salida</b> se emplean típicamente para recuperar
                    valores calculados u obtenidos dentro de procedimientos almacenados</p>
                <p>Si el valor resulta ser más grande
                    que el tamaño indicado, se emitirá un error.</p>
                <img src="img/proceOut.png" class="img-fluid mx-auto d-block" alt="pdo6">
                <img src="img/proceOut1.png" class="img-fluid mx-auto d-block" alt="pdo6">
                <p>++ La llamada al <b>procedimiento almacenado</b> debe hacerse con dos query,
                    deben realizarse dos consultas con la conexión a la base de datos
                    obtenida, en una consulta se hará el <b>CALL</b> al procedimiento
                    almacenado y con la segunda consulta se logra recuperar los
                    parámetros <i>output</i> del procedimiento.</p>
                <!--IN OUT-->
                <h4 class="mt-3">PROCEDIMIENTO ALMACENADOCON PARÁMETRO <i>IN-OUT</i></h4>
                <p>++ Al igual que los <b>procedimientos almacenados con parámetros de
                        salida</b>, la llamada a procedimientos almacenados con parámetros de
                    entrada y de salida, debe realizarse con dos query.</p>
                <img src="img/proceInOut.png" class="img-fluid mx-auto d-block" alt="pdo6">
                <img src="img/proceInOut1.png" class="img-fluid mx-auto d-block" alt="pdo6">
                <p class="text-center mt-3 border-bottom">++ <b>1.</b> Call al procedimiento Almacenado <br>
                   ++ <b>2.</b> Recupera los parámetros output del procedimiento.
                </p>
            </div>
        </div>
    </div>
    <script>
        //Script para mostrar y ocultar elementos
        // Seleccionamos el botón y el div
        const btnToggle = document.getElementById('btnToggle');
        const miDiv = document.getElementById('miDiv');

        // Agregamos un evento click al botón
        btnToggle.addEventListener('click', () => {
            // Si el div está oculto, lo mostramos
            if (miDiv.style.display === 'none' || miDiv.style.display === '') {
                miDiv.style.display = 'block';
                btnToggle.textContent = 'Ocultar Excepciones';
            } else {
                // Si el div está visible, lo ocultamos
                miDiv.style.display = 'none';
                btnToggle.textContent = 'Mostrar Excepciones';
            }
        });
    </script>
</body>

</html>