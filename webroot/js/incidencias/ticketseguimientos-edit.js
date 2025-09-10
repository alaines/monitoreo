$(document).ready(function() {
        var equipoId = $("#TicketSeguimientoEquipoId").val();
        var respId = $("#idResponsable").val();
        $("#TicketSeguimientoResponsableId").load("../../responsables/listar/"+equipoId+"/"+respId);
});
$("#TicketSeguimientoEquipoId").change(function(){ //se ejecuta con el evento onChange
    var equipoId = $(this).val();
    $("#TicketSeguimientoResponsableId").load("../../responsables/listar/"+equipoId);
});