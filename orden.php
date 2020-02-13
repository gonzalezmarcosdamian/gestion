<?php 

    /////// CONEXIÓN A LA BASE DE DATOS /////////
    require 'conexion.php';    
    $conexion = $link;

    //////////////// VALORES INICIALES //////////////////       

    if(isset($_POST["id_orden"]))
    {
        
        $q=$conexion->real_escape_string($_POST['id_orden']);
        $query="SELECT * FROM orden WHERE 
            id=".$q;        
        $buscarOrden=$conexion->query($query);                        
        $fila= $buscarOrden->fetch_assoc();
        
        //datos
        $id_orden=$fila["id"];
        $fecha=$fila["fecha"];
        $descripcion=$fila["descripcion"];
        $corralon=$fila['corralon'];

        $obra=$fila['id_obra'];

        $action="/gestion/update_orden.php";
    }
    else if (isset($_POST["id_obra"])) 
    {
            $id_orden="";
            $fecha="";
            $descripcion="";
            $corralon="";
            // el valor de obra, lo tiene que ver del php ordenes_obra.php, poder enviarlo por el JS action_obra
            // es el id de la obra en realidad, se romperia si conincide con un id de orden
            $obra=$_POST["id_obra"];

            $action="/gestion/neworden.php";
    }
    else 
    {
        exit();
    }

?>



	<div class="modal fade" id="modal-orden" tabindex="-1" role="dialog" aria-labelledby="pop" aria-hidden="true">

	  <div class="modal-dialog" role="document">

	    <div class="modal-content">

	      <div class="modal-header">

	        <h5 class="modal-title" id="pop">FORMULARIO DE ORDEN DE COMPRA</h5>		        

                    <button type="button" class="close" id="close" onclick="closer()" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
		                

        	      </div>

        	      <div class="modal-body">

        	        <form action="<?php echo $action?>" method="POST" id="formulario-orden" >

        	        	 <div style="display: none">
                                <p> ID </p>
                                <input type="text" id="id_orden" name="id_orden" readonly="readonly" value="<?php echo $id_orden ?>"/>
                        </div>

            			<p>
        					Fecha:<br>
        					<input type="date" id="fecha" name="fecha" required="" value="<?php echo $fecha ?>" />
        				</p>
        				<p>
        					Corralon:<br>
        					<input type="text" name="corralon" id="corralon" required="" value="<?php echo $corralon ?>"/>
        				</p>
        				<p>
        					Obra:<br>
        					<input id="obra" type="text" name="obra" value="<?php echo $obra ?>" readonly="readonly" />
        				</p>

        				<p>
        					Descripcion:<br>
        				<input type="text" style="width:200px;height:50px" align="left" name="descripcion" value="<?php echo $descripcion ?>" />
        				</p>
        													
        			<button type="submit" class="btn btn-primary">Enviar</button>	


        			</form>

        	      </div>
	      
	    </div>
	  </div>
	</div>

<script type="text/javascript">

    function closer() {
        
        $('body').on('hidden.bs.modal', '.modal', function () {
            alert("hi");
          $(this).removeData('bs.modal');
        });
    }



</script>