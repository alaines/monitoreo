        $("#TicketSeguimientoEquipoId").change(function(){ //se ejecuta con el evento onChange
            var equipoId = $(this).val();
            $("#TicketSeguimientoResponsableId").load("../../responsables/listar/"+equipoId);
        });