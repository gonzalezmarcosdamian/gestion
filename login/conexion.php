<?php

$conexion = new mysqli('localhost','root','','gestion');

if ($conexion->connect_errno) 
    {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
//else
//  {
//        echo "Conecto la base de datos"."<br>";
//    }
//EL ELSE ANDA CORRECTAMENTE
?>