        $("#TicketIncidenciaNombre").change(function(){ //se ejecuta con el evento onChange
            var incidenciaId = $(this).val();
            $("#TicketIncidenciaId").load("../incidencias/tipos/"+incidenciaId);
        });
        
        $("#TicketIncidenciaId").change(function(){ //se ejecuta con el evento onChange
            var tipoId = $(this).val();
            //$("#TicketIncidenciaId").load("../incidencias/tipos/"+incidenciaId);
            $.ajax({
                url: 'http://192.168.10.242/protransito/incidencia/incidencias/prioridad/'+tipoId,
                success: function(respuesta) {
                    $( "#TicketPrioridades" ).val(respuesta.Prioridade.nombre);
                    $( "#TicketPrioridadeId" ).val(respuesta.Prioridade.id);
                    console.log(respuesta.Prioridade.nombre);
                }
            });
        });
        
        $( "#cruceBusca" ).autocomplete({
            minLength: 2,
            source: '../../intersecciones/cruces/autoCompletado',
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