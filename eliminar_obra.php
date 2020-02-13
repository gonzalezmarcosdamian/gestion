<?php
	require 'conexion.php';
	$conexion = $link;


	$id=$_GET['id_obra'];
	//echo $id;
	//toma bien el parametro

	$sql="DELETE FROM obra WHERE id='$id'";
	//echo $sql;
	$result=$conexion->query($sql);
	//var_dump($result);

    header("Location: /gestion/index.html");
?>