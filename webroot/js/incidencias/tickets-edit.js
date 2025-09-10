        var getUrl = window.location;
        var base_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

        $(document).ready(function() {
                var tipoId = $("#TicketTipoId").val();
                var tipoId2 = $("#TicketTipoId2").val();;
                $("#TicketIncidenciaId").load(base_url+"/incidencia/incidencias/tipos/"+tipoId+"/"+tipoId2);
        });        
        
        $("#TicketIncidenciaNombre").change(function(){ //se ejecuta con el evento onChange
            var incidenciaId = $(this).val();
            $("#TicketIncidenciaId").load(base_url+"/incidencia/incidencias/tipos/"+incidenciaId);
        });
        
        $("#TicketIncidenciaId").change(function(){ //se ejecuta con el evento onChange
            var tipoId = $(this).val();
            var origin = $(location).attr('origin');
            $.ajax({
                url: base_url+'/incidencia/incidencias/prioridad/'+tipoId,
                success: function(respuesta) {
                    $( "#TicketPrioridades" ).val(respuesta.Prioridade.nombre);
                    $( "#TicketPrioridadeId" ).val(respuesta.Prioridade.id);
                }
            });
        });
        
        
        $( "#cruceBusca" ).autocomplete({
            minLength: 2,
            source: base_url+'/intersecciones/cruces/autoCompletado',
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