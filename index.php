<?php

/*
connect_error: devulve null si no ha ocurrido ningun error
connect_errno: devulve el codigo del error de la ultima llamada a la conexion
character_set_name(): devuelve los caracteres por defectos con los que se esta trabajando
set_charset(): para setear el juegos de caracteres con que se va a trabajar
host_info: devulve el tipo de conexion usada
query(): realiza una peticion a la base de datos
fetch_assoc(): devuelve un array asociativo con la siguiente fila de resultado de la peticion
free(): libera la memoria usada el guardar el resultado de una peticion
close(): se cierra la conexion
*/

$server = "localhost";
$user = "root";
$database = "practice";
$password = "";

$mysqli = new mysqli( $server, $user, $password, $database );

if( $mysqli->connect_error ){
    die( "Error de conexión (" . $mysqli->connect_errno . ") " . $mysqli->connect_error );
}

echo "Los caracteres en uso son: " . $mysqli->character_set_name();

if( $mysqli->set_charset("utf8") )
    echo "Caracteres seteados: " . $mysqli->character_set_name();
else
    echo "Error al intentar setear los caracteres utf8";


echo $mysqli->host_info;

$query = "select * from users";

if( $resultado = $mysqli->query( $query ) ){

    while( $fila = $resultado->fetch_assoc() ){
        echo "<div>" . "<strong>Nombre:</strong> " . $fila["first_name"] . " <strong>Apellido:</strong> " . $fila["last_name"] ."</div>";
    }
    
    $resultado->free();
}
else
    echo "Error al hacer petición";




$mysqli->close();