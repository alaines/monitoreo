function actEst(ide){
	var estado = $("#GrupoEstado"+ide).is(":checked");
	if (estado == true){
		var esta = 1;
	} else {
		var esta = 0;
	}
	$.ajax({
            type: "POST",
            url: "cambiarEstado",
                data: { id: ide, estado: esta }
            }).done(function( msg ) {
                alert( "Cambio realizado");
            });
}