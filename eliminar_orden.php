<?php
	require 'conexion.php';
	$conexion = $link;

	$id_orden=$_GET['id_orden'];
	$id_obra=$_GET['id_obra'];

	//echo $id_orden.' '.$id_obra;
	//Este echo me garantiza que toma bien el parametro

	$sql="DELETE FROM orden WHERE id='$id_orden'";
	
	$result=mysqli_query($conexion,$sql);
	//var_dump($result);

    header("Location: /gestion/ordenes_obra.php?id_obra=".$id_obra); 
?>