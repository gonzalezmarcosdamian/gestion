

<?php
try{
require 'conexion.php';
$conexion = $link;
//////////////// VALORES INICIALES //////////////////////
//echo var_dump($_GET);
//exit;

$id_obra=$_GET['id_obra'];

//DATOS DE OBRA
$query="SELECT * FROM obra where id='$id_obra'";
	$resultado=$conexion->query($query);
		$obra= $resultado->fetch_assoc();
		//print_r($obra);

		$nombre=$obra['nombre'];
		//echo $nombre;
		$descripcion=$obra['descripcion'];
		$fecha_inicio=$obra['fecha_inicio'];
		$fecha_fin=$obra['fecha_fin'];

?>

<!doctype html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<!-- ESTILOS -->
		<link href="css/estilos.css" rel="stylesheet">
		
		<!-- SCRIPTS JS-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  
		<!-- Latest minified bootstrap css -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

		<!-- Latest minified bootstrap js -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		
		
	
    <title>OBRA</title>    
</head>

<body>

		<header>
			<div class="alert alert-info">
			<h2>OBRA SELECCIONADA: <?php echo $nombre." - ID: ".$id_obra; ?> </h2>
			<h3><?php echo " Fecha de inicio: ".$fecha_inicio. " --- Fecha de finalizacion: ".$fecha_fin; ?> </h3>

			</div>
		</header> 

		<div id="botones_superior">

			<button type="button" name="nuevo" class="btn btn-primary" data-toggle="modal" data-target="#modal-orden" onclick="action_orden_new(<?php echo $id_obra; ?>)">Nueva orden de compra</button>

			<a class="btn btn-warning" role="button" href="pdf_obra.php?id_obra='<?php echo $id_obra ?>'">REPORTE PDF</a>

			<a id="atras" name="atras" class="btn btn-danger" href="/gestion/index.html " role="button">Menu obras</a>

		</div>	
		<!-- saque el formulario -->
		<div id="formulario-orden"></div>

		<section id="tabla_resultado_obra">
		<!-- AQUI SE DESPLEGARA NUESTRA TABLA DE OBRAS -->
		



<?php


//DATOS DE OBRA
$query="SELECT * FROM obra where id='$id_obra'";
	$resultado=$conexion->query($query);
		$obra= $resultado->fetch_assoc();
		//print_r($obra);

		$nombre=$obra['nombre'];
		//echo $nombre;
		$descripcion=$obra['descripcion'];
		$fecha_inicio=$obra['fecha_inicio'];
		$fecha_fin=$obra['fecha_fin'];


//tabla para mostrar las ordenes, utilizando el id de obra
$tabla="";
$query="SELECT * FROM orden WHERE id_obra='$id_obra'";

$buscarOrden=$conexion->query($query);


if ($buscarOrden->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
			<td>ID</td>
			<td>Fecha</td>
			<td>Corralon</td>
			<td>Obra</td>
			<td>Descripcion</td>
		</tr>';

	// EL BOTON ELIMINAR ANDA, PERO DEBO MIRAR A METODO POST PARA SEGURIDAD
	// EL BOTON PDF ANDA
	// EL BOTON EDITAR NO ANDA, NO SE QUE HACER
	while($fila= $buscarOrden->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$fila['id'].'</td>
			<td>'.$fila['fecha'].'</td>
			<td>'.$fila['corralon'].'</td>
			<td>'.$fila['id_obra'].': '.$nombre.'</td>
			<td>'.$fila['descripcion'].'</td>
			
			<td>
				<a class="btn btn-danger" role="button" href="eliminar_orden.php?id_orden='.$fila['id'].'&id_obra='.$id_obra.'">Eliminar</a>

				<button type="button" id="edit" onclick="action_orden_edit('.$fila['id'].')" class="btn btn-warning" >Editar</button>

				<a class="btn btn-primary" name="pdf_orden" id="pdf_orden" role="button" href="pdf_orden.php?id_orden='.$fila['id'].'&id_obra='.$id_obra.'">Pdf</a>

					  <div class="form-group">
					    <label for="exampleFormControlFile1">Cargar Factura</label>

					    <input type="file" class="form-control-file" id="cargar_factura">

					    <button type="button" id="cargar" onclick="" class="btn btn-danger" >Cargar</button>
					    <button type="button" id="reset" onclick="" class="btn btn-warning" >Reset</button>

					  </div>
					

			</td>

		 </tr>
		';
	}

	$tabla.='</table></section>';
} else
	{
		$tabla="La obra seleccionada no contiene ordenes de compra.";
	}
echo $tabla;
//desconectar($conexion);
    } 
        catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
?>
	

</body>


		<script type="text/javascript">
			 
			function action_orden_edit(id) {
				$.ajax({
					url: "orden.php",
					method: "post",
					data: { id_orden: id},
					success: function(data) {
						//alert(id);
						// si toco en nuevo pasa el id de la obra
						$("#formulario-orden").html(data);
						$("#modal-orden").modal("show");
					}
				});
			}

			function action_orden_new(id) {
				$.ajax({
					url: "orden.php",
					method: "post",
					data: { id_obra: id},
					success: function(data) {
						//alert(id);
						// si toco en nuevo pasa el id de la obra
						//$("#formulario-orden")[0].reset();
						$("#formulario-orden").html(data);
						$("#modal-orden").modal("show");
					}
				});
			}

		</script>


	
</html>