<?php

include("conexion.php");

/*NUEVO CODIGO DE PRUEBA*/
//$myarray = array( $_POST);
//foreach ($myarray as $key => $value)
//{
 //echo "<p>".$key."</p>";
 //echo "<p>".$value."</p>";
 //echo "<hr />";
//}
/*NUEVO CODIGO DE PRUEBA*/

if(!empty($_POST)){
 
  $user= $_POST["inputuser"];
  $pass = $_POST["inputpass"];

  echo "El usuario ".$user." con contraseña:".$pass."<br>";

  $sql="SELECT id FROM usuarios WHERE user='$user' AND pass='$pass'";
  // echo "[$sql]"; para ver que string forma
  
  $resultado=$conexion->query($sql);

  $rows=$resultado->num_rows;

  if ($rows>0)
      {
          $row=$resultado->fetch_assoc();
          echo "<script>
                    alert('Ingreso correcto');</script>";
        header("Location: menu.php");

      }
  else
      {
           echo "<script>
                    alert('Ingreso INcorrecto');
                    windows.location= 'index.html';
                  </script>";
      }

}
else
{
  echo "post no trae nada";
}

?>
