<?php
//Iniciamos sesion
session_start();
//Establecemos conexion
include('dbcon.php');

//Si se pulsa en ELIMINAR--------------------------------------------
if (isset($_POST['eliminar_estudiante'])) {
    $id_estudiante = $_POST['eliminar_estudiante'];

    //Ejecutamos la consulta
    try {
        $query = "DELETE FROM estudiantes WHERE id=:stud_id";
        $statement = $con->prepare($query);
        $data = [':stud_id' => $id_estudiante];
        $query_execute = $statement->execute($data);

        //Comprobamos los resultados de la consulta
        if ($query_execute) {
            //Guardamos un mensaje en la sesion
            $_SESSION['mensaje'] = "Eliminado Correctamente";
            //Volvemos al inicio
            header('Location: index.php');
            exit(0); //Salimos
        } else {
            //Guardamos un mensaje en la sesion
            $_SESSION['mensaje'] = "Fallo al eliminar contacto";
            //Volvemos al inicio
            header('Location: index.php');
            exit(0); //Salimos
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    //Consulta
    $query = "DELETE FROM estudiantes WHERE id=:$id_estudiante";
}

//Si se pulsa en ACTUALIZAR--------------------------------------------
if (isset($_POST['actualizar_estudiante'])) {
    //Variables
    $id_estudiante = $_POST['estud_id'];
    $nombreCompleto = $_POST['nombreCompleto'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $curso = $_POST['curso'];

    //Ejecutamos con un try-catch
    try {
        //Consulta
        $query = "UPDATE estudiantes SET nombreCompleto=:nombreCompleto, email=:email, telefono=:telefono, curso=:curso WHERE id=:estud_id LIMIT 1";

        ///Preparamos consulta
        $statement = $con->prepare($query);

        //Guardamos datos 
        $data = [
            ':nombreCompleto' => $nombreCompleto,
            ':email' => $email,
            ':telefono' => $telefono,
            ':curso' => $curso,
            ':estud_id' => $id_estudiante
        ];

        //Ejecutamos la consulta
        $query_execute = $statement->execute($data);

        //Comprobamos los resultados de la consulta
        if ($query_execute) {
            //Guardamos un mensaje en la sesion
            $_SESSION['mensaje'] = "Actualizado Correctamente";
            //Volvemos al inicio
            header('Location: index.php');
            exit(0); //Salimos
        } else {
            //Guardamos un mensaje en la sesion
            $_SESSION['mensaje'] = "Fallo al actualizar contacto";
            //Volvemos al inicio
            header('Location: index.php');
            exit(0); //Salimos
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//Si se pulsa en AÑADIR--------------------------------------------
if (isset($_POST['guardar_estudiante'])) {

    try {
        //Gurdamos en variables
        $nombreCompleto = $_POST['nombreCompleto'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $curso = $_POST['curso'];

        //Establecemos consulta
        $query = "INSERT INTO estudiantes (nombreCompleto, email, telefono, curso) VALUES (:nombreCompleto, :email, :telefono, :curso)";
        //Preparamos la conexion de la consulta
        $query_run = $con->prepare($query);

        //Guardamos los datos en un array
        $data = [
            ':nombreCompleto' => $nombreCompleto,
            ':email' => $email,
            ':telefono' => $telefono,
            ':curso' => $curso,
        ];

        //Ejecutamos la consulta con los datos y guardamos en variable
        $query_execute = $query_run->execute($data);

        //Comprobamos los resultados de la consulta
        if ($query_execute) {

            //Guardamos un mensaje en la sesion
            $_SESSION['mensaje'] = "Insertado Correctamente";
            //Volvemos al inicio
            header('Location: index.php');
            exit(0); //Salimos
        } else {
            //Guardamos un mensaje en la sesion
            $_SESSION['mensaje'] = "Fallo al insertar contacto";
            //Volvemos al inicio
            header('Location: index.php');
            exit(0); //Salimos
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
