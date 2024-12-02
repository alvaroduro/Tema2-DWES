<?php
//Eliminación de usuario

//Requerimos conexión
require_once 'config.php';

//Obtenemos el id del usuario del listado
$id = $_GET['id'];

//Comprobamos que el id no esta vacio y si es un número
if (isset($_GET['id']) && (is_numeric($_GET['id']))) {

    //Generamos la consulta
    try {

        //Conectamos en la BD y lo guardamos
        $query = "DELETE FROM usuarios WHERE id=:id";
        $resultado = $conexion->prepare($query);
        //Supervisamos y ejecutamos
        $resultado->execute(['id' => $id]);


        //Si hay datos en la consulta
        if ($resultado) {
            $msgresultado = '<div class="alert alert-success mx-2">' . "La eliminacion se realizó correctamente!!" . '<img width="50" height="50" src="https://img.icons8.com/clouds/100/ok-hand.png" alt="ok-hand"/></div>';

            //Volvemos al listado
            header("Location:listarUsuarios.php");
        } //o no
    } catch (PDOException $ex) {
        $msgresultado = '<div class="alert alert-danger w-100 mx-2">' . "Fallo al realizar al consulta a la Base de Datos!!" . '<img class="mx-2" width="40" height="40" src="https://img.icons8.com/cute-clipart/64/error.png" alt="error"/></div>';
        //die();
    }
} else {
    echo '<div class="alert alert-danger w-100 mx-2">' . "ID incorrecto, No se pudo acceder al id del contacto!!" . '<img class="mx-2" width="40" height="40" src="https://img.icons8.com/cute-clipart/64/error.png" alt="error"/></div>';
}
