<?php

    //-----------------------------------------------------------------------------------
    //    PHP orden para INSERTAR 
    //-----------------------------------------------------------------------------------
    
    require 'conexion.php';
    $conexion=$link;

        $id=$_POST["id"];
        $fecha=$_POST["fecha"];
        $corralon=$_POST["corralon"];
        $descripcion=$_POST["descripcion"];
        $obra=$_POST["obra"];
        

                $sql="INSERT INTO orden VALUES(null,'$fecha','$corralon','$obra','$descripcion')";              
                //echo "[$sql]"; 
                mysqli_query($conexion,$sql);
    
   header("Location: http://localhost/gestion/ordenes_obra.php?id_obra=".$obra);
 ?> 