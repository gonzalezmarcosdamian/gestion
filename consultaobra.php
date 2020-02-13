 <?php
/////// CONEXIÓN A LA BASE DE DATOS /////////
require 'conexion.php';
$conexion = $link;
//////////////// VALORES INICIALES //////////////////////

$tabla="";
$query="SELECT * FROM obra ORDER BY id";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
 
//Determina si una variable está definida y no es NULL. isset (), resultado bool
if(isset($_POST['valorBusqueda']))
{
	$q=$conexion->real_escape_string($_POST['valorBusqueda']);

	$query="SELECT * FROM obra WHERE 
		id LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%' OR
		descripcion LIKE '%".$q."%' OR
		fecha_inicio LIKE '%".$q."%' OR
		fecha_fin LIKE '%".$q."%'";
}

$buscarOrden=$conexion->query($query);

//print_r($buscarOrden); NADA
//print_r($q);

if ($buscarOrden->num_rows > 0)
{
	$tabla.= 
	'<table class="table" id="tabla_resultado_obra">
		<tr class="bg-primary">
			<td >ID</td>
			<td>Nombre</td>
			<td>Descripcion</td>
			<td>Fecha de inicio</td>
			<td>Fecha de finalización estimada</td>
		</tr>';

	while($fila= $buscarOrden->fetch_assoc())
	{	
		$tabla.=
		'<tr>
			<td>'.$fila['id'].'</td>
			<td>'.$fila['nombre'].'</td>
			<td>'.$fila['descripcion'].'</td>
			<td>'.$fila['fecha_inicio'].'</td>
			<td>'.$fila['fecha_fin'].'</td>
		
			<td>

			<a class="btn btn-primary" role="button" href="ordenes_obra.php?id_obra='.$fila['id'].'">Ingresar</a>

			<a class="btn btn-danger" role="button" href="eliminar_obra.php?id_obra='.$fila['id'].'">Eliminar</a>
			
			<button class="btn btn-warning" data-toggle="modal" data-target="#pop" onclick="edit('.$fila['id'].')">Editar</button>

			</td>
	</tr>'; 
	}

	$tabla.='</table></section>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;

//desconectar($conexion);
?>
