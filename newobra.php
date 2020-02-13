<?php

    //-----------------------------------------------------------------------------------
    //    PHP OBRA INSERTAR
    //-----------------------------------------------------------------------------------

    require 'conexion.php';
    $conexion=$link;

        $nombre=$_POST["nombre"];
        $descripcion=$_POST["descripcion"];
        $fecha_inicio=$_POST["fecha_inicio"];
        $fecha_fin=$_POST["fecha_fin"];
        

                $sql="INSERT INTO obra VALUES(null,'$nombre','$descripcion','$fecha_inicio','$fecha_fin')";              
                //echo "[$sql]"; 
                mysqli_query($conexion,$sql);
    
    header("Location: index.html"); 
 ?>