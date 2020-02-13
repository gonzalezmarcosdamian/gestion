
<?php
	require 'pdf/fpdf.php';
	require 'conexion.php';
	$conexion = $link;
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('img/logo.jpeg', 5, 5, 30 );
			$this->SetFont('Arial','B',18);
			$this->Cell(30);
			$this->Cell(120,10, 'ORDEN DE COMPRA',0,0,'C');
			$this->Ln(40);
		}
		
		function Footer()
		{
			$this->SetY(-50);
			$this->SetFont('Arial','I', 10);
			$this->Cell(0,10, 'La Adela - Provincia de La Pampa - Argentina',0,0,'C' ); $this->ln(5);
			$this->Cell(0,10, 'C.P.: 8138- TE/FAX: 02931-432251-TE:430650',0,0,'C' );$this->ln(5);
			$this->Cell(0,10, 'e-mail: muniadela@speedy.com.ar',0,0,'C' );
			$this->Cell(-25,15, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}



	$pdf = new PDF();
	$pdf->AliasNbPages();


	//Recojo todos los datos de la obra

	$id_obra=$_GET['id_obra'];
	//echo $id_obra;

	$query="SELECT * FROM obra where id=".$id_obra;
	$resultado=$conexion->query($query);
		$obra= $resultado->fetch_assoc();

		$nombre=$obra['nombre'];
		$descripcion=$obra['descripcion'];
		$fecha_inicio=$obra['fecha_inicio'];
		$fecha_fin=$obra['fecha_fin'];
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	

	//Recojo datos de orden
	//$id_orden=$_GET['id_orden'];	

    $sql = "SELECT * FROM orden WHERE id_obra=$id_obra";   
    $rs = mysqli_query($conexion,$sql);
    
    //var_dump($fila = mysqli_fetch_array($rs));


	while ($fila = mysqli_fetch_array($rs))
		{	$pdf->AddPage('P','A4');

				$pdf->SetFont('Arial','B',14);
				$pdf->Cell(50);
				$pdf->Line('10', '47', '200', '47');

				$pdf->Cell(100,6,'Obra: '.$nombre,0,0,'L',0);
				$pdf->ln();$pdf->Cell(50);
				$pdf->Cell(100,6,'Descripcion de obra: '.$descripcion,0,0,'L',0);
				$pdf->ln();$pdf->Cell(50);
				$pdf->Cell(100,6,'Fecha inicio obra: '.$fecha_inicio,0,0,'L',0);
				$pdf->ln();$pdf->Cell(50);
				$pdf->Cell(100,6,'Fecha de finalizacion de obra: '.$fecha_fin,0,0,'L',0);
				$pdf->ln(15);$pdf->Cell(30);

				$pdf->Line('10', '80', '200', '80');
				

					$pdf->Cell(100,6,'ID de orden de compra: '.$fila['id'],0,0,'L',0);
					$pdf->ln();$pdf->Cell(30);

					$pdf->SetFont('Arial','',14);

						$pdf->Cell(70,6,'Fecha: '.$fila['fecha'],0,0,'L',0);
						$pdf->ln();$pdf->Cell(30);
						$pdf->Cell(70,6,'Corralon: '.$fila['corralon'],0,0,'L',0);
						$pdf->ln();$pdf->Cell(30);
						//$pdf->Cell(70,6,'Obra: '.$fila['obra'],0,0,'L',0);
						//$pdf->ln(10);
						$pdf->MultiCell(0,7,'Descripcion: '.$fila['descripcion'],0,'L',0);
						$pdf->ln(20);

						$pdf->Image('img/firma.jpeg', 120, 200, 60);

				$pdf->Line('10', '245', '200', '245');

			}

	$pdf->Output();
	//desconectar($conexion);
?>