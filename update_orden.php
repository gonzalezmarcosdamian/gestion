<?php

    //-----------------------------------------------------------------------------------
    //    PHP OBRA INSERTAR
    //-----------------------------------------------------------------------------------

    require 'conexion.php';
    $conexion=$link;

        $id_orden=$_POST["id_orden"];
        $corralon=$_POST["corralon"];
        $descripcion=$_POST["descripcion"];
        $obra=$_POST["obra"];
        $fecha=$_POST["fecha"];
        

        //$q="UPDATE orden SET Fecha='$datofecha', Departamento='$datodepartamento', Corralon='$datocorralon',Obra='$datoobra',Descrip='$datodescripcion' WHERE ID='$ident'";

        $sql="UPDATE orden SET fecha='$fecha', descripcion='$descripcion', corralon='$corralon', id_obra='$obra' WHERE id='$id_orden'";              
        //echo "[$sql]"; 
        mysqli_query($conexion,$sql);
    
 header("Location: /gestion/ordenes_obra.php?id_obra=".$obra); 
 ?>