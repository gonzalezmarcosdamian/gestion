
function edit(id) {
	$.ajax({
		url: "obra.php",
		method: "post",
		data: { id_obra: id },
		success: function(data) {
			// alert(data);
			$("#formulario-obra").html(data);
			$("#modal-obra").modal("show");
		}
	});
}


