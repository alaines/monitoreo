$(document).ready(function() {
        var tipoId = $("#TicketTipoId").val();
        var tipoId2 = $("#TicketTipoId2").val();;
        $("#TicketIncidenciaId").load("/protransito/incidencia/incidencias/tipos/"+tipoId+"/"+tipoId2);
});        
        
        $("#TicketIncidenciaNombre").change(function(){ //se ejecuta con el evento onChange
            var incidenciaId = $(this).val();
            $("#TicketIncidenciaId").load("/protransito/incidencia/incidencias/tipos/"+incidenciaId);
        });
        
        $("#TicketIncidenciaId").change(function(){ //se ejecuta con el evento onChange
            var tipoId = $(this).val();
            var origin = $(location).attr('origin');
            $.ajax({
                url: origin+'/protransito/incidencia/incidencias/prioridad/'+tipoId,
                success: function(respuesta) {
                    $( "#TicketPrioridades" ).val(respuesta.Prioridade.nombre);
                    $( "#TicketPrioridadeId" ).val(respuesta.Prioridade.id);
                }
            });
        });
        
        
        $( "#cruceBusca" ).autocomplete({
            minLength: 2,
            source: '/protransito/intersecciones/cruces/autoCompletado',
            focus: function( event, ui )  { $( "#cruceBusca" ).val( ui.item.Cruce.codigo + " - " + ui.item.Cruce.nombre ); return false;},
            select: function( event, ui ) {
                $( "#TicketCruceId" ).val( ui.item.Cruce.id );
                return false;
            }//select
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
                    .data( "item.autocomplete", item )
                    .append( "<a>" + item.Cruce.codigo + " - " + item.Cruce.nombre + "</a>" )
                    .appendTo( ul );
        };//autocomplete