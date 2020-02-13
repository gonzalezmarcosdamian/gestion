
<?php 

    /////// CONEXIÓN A LA BASE DE DATOS /////////
    require 'conexion.php';
    $conexion = $link;
    //////////////// VALORES INICIALES //////////////////////

    if(isset($_POST["id_obra"])) {
        
        $q=$conexion->real_escape_string($_POST['id_obra']);

        $query="SELECT * FROM obra WHERE 
            id LIKE '%".$q."%' OR
            nombre LIKE '%".$q."%' OR
            descripcion LIKE '%".$q."%' OR
            fecha_inicio LIKE '%".$q."%' OR
            fecha_fin LIKE '%".$q."%'";

            $buscarOrden=$conexion->query($query);
            $fila= $buscarOrden->fetch_assoc();

            //datos
            $id_obra=$fila["id"];
            $nombre=$fila["nombre"];
            $descripcion=$fila["descripcion"];
            $fecha_inicio=$fila["fecha_inicio"];
            $fecha_fin=$fila["fecha_inicio"];

            $action="update_obra.php";
    }  
    else 
    {
            $id_obra="";
            $nombre="";
            $descripcion="";
            $fecha_inicio="";
            $fecha_fin="";

            $action="newobra.php";
    }
//exit();
?>


<div class="modal fade" id="modal-obra" tabindex="-1" role="dialog" aria-labelledby="pop" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">FORMULARIO OBRA</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close" onclick="close()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">

                <form action="<?php echo $action?>" method="post" id="formulario-obra">

                    <div style="display: none">
                        <p> ID </p>
                        <input type="text" id="id-obra" name="id-obra" readonly="readonly" value="<?php echo $id_obra ?>"/>
                    </div>

                    <p>
                        Nombre:<br>
                        <input type="text" id="nombre" name="nombre" required="" value="<?php echo $nombre ?>"/>
                    </p>
                    <p>Descripción:<br>
                        <textarea name="descripcion" class="form-control" id="descripcion" cols="30" rows="2"><?php echo $descripcion ?></textarea>
                    </p>
                    <p>
                        Fecha de inicio:<br>
                        <input type="date" id="fecha_inicio" name="fecha_inicio" required="" value="<?php echo $fecha_inicio?>" />
                    </p>
                    <p>
                        Fecha de finalización (estimada):<br>
                        <input type="date" id="fecha_fin" name="fecha_fin" required="" value="<?php echo $fecha_fin?>"/>
                    </p>	


                    <button type="submit" class="btn btn-primary">Enviar</button>	
                </form>
            </div>					
        </div> 
    </div>
</div>

