        $("#TicketSeguimientoEquipoId").change(function(){ //se ejecuta con el evento onChange
            var equipoId = $(this).val();
            $("#TicketSeguimientoResponsableId").load("../../responsables/listar/"+equipoId);
        });
        
        $('#TicketSeguimientoReporteFecha').datepicker({
            locale: 'es-es',
            format: 'dd-mm-yyyy',
            uiLibrary: 'bootstrap4'
        });