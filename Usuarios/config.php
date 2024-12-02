<?php
//Conexión a la base de datos mediante PDO

//Definimos variables para la conexión
$dbHost = 'localhost'; //Dirección del servidor de base de datos
$dbName = 'bdusuarios';
$dbUser = 'root';
$dbPass = '';

//PDO (PHP Data Objects) para conectarse a una base de datos MySQL y manejar errores en la conexión
try {

    //Variable para nuevo objeto PDO (variables)
    $conexion = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

    //Atributos para manejar errores
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // * PDO::ATTR_ERRMODE: Es un atributo de PDO que indica cómo manejar los errores.
    // * PDO::ERRMODE_EXCEPTION: Indica que, si ocurre un error, se generará una excepción. Esto permite manejar el error de forma controlada (como se hace más adelante con el bloque catch).

    //Mensaje en caso de éxito conexión
    echo '<div class="alert alert-success w-100">' . "Conectado a la Base de Datos de usuarios!!" . '<img class="mx-2" width="70" height="60" src="img/iconoCheck.png" alt="iconoCheck"></div>';
} catch (PDOException $ex) {
    //Si no se ha podid conectar
    echo '<div class="alert alert-danger w-100">' . "Fallo al conectar Base de Datos de usuarios!!" . '<img class="mx-2" width="70" height="60" src="img/iconoError.png" alt="iconoCheck"></div>';
    //echo $ex; //Si queremos imprimir el mesaje de error
}
