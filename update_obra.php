<?php

    //-----------------------------------------------------------------------------------
    //    PHP OBRA INSERTAR
    //-----------------------------------------------------------------------------------

    require 'conexion.php';
    $conexion=$link;

        $id_obra=$_POST["id-obra"];
        $nombre=$_POST["nombre"];
        $descripcion=$_POST["descripcion"];
        $fecha_inicio=$_POST["fecha_inicio"];
        $fecha_fin=$_POST["fecha_fin"];
        

        //$q="UPDATE orden SET Fecha='$datofecha', Departamento='$datodepartamento', Corralon='$datocorralon',Obra='$datoobra',Descrip='$datodescripcion' WHERE ID='$ident'";

        $sql="UPDATE obra SET nombre='$nombre', descripcion='$descripcion', fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin' WHERE id='$id_obra'";              
        //echo "[$sql]"; 
        mysqli_query($conexion,$sql);
    
 header("Location: index.html"); 
 ?>