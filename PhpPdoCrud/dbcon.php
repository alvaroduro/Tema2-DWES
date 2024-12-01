<!--Conexion para BD-->
<?php

//Variables conexion
$servername = 'localhost';
$userName = 'root';
$password = '';
$database = 'phpcrud';


//Try-chatch para conexion
try {
    //Establecemos variable PDO
    $con = new PDO("mysql:host=$servername;dbname=$database", $userName, $password);

    //Funcion que devuelve valor atributo conexion y posible error
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión Satisfactoria";
} catch (PDOException $e) {
    echo "Conexión Fallida " . $e->getMessage();
}
?>