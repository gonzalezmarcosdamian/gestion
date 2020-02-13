 $(obtener_registros());

function obtener_registros(valorBusqueda)
{
	$.ajax({
		url : 'consultaobra.php',
		type : 'POST',
		dataType : 'html',
		data : { valorBusqueda: valorBusqueda }, 
		})

	.done(function(resultado){
		//alert(resultado);
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	//alert(valorBusqueda);
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});

