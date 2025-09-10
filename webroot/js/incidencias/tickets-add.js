        var getUrl = window.location;
        var base_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

        $(document).ready(function(){
            HoldOn.close();
            $('#grabar').on('click', function(){
                nomindidencia = $("#TicketIncidenciaNombre").val();
                idincidencia = $("#TicketIncidenciaId").val();
                cruce = $("#TicketCruceId").val();
                if(nomindidencia == ''|| idincidencia == '' || cruce == ''){
                    alert('Debe seleccionar incidencia y cruce');
                    return false;
                };
                var options = {
                    theme:"sk-circle",
                    message:'estamos procesando su información, espere un momento.. ',
                    backgroundColor:"#1b477c",
                    textColor:"white"
                };
                HoldOn.open(options);        
            });
        });

        $("#TicketIncidenciaNombre").change(function(){ //se ejecuta con el evento onChange
            var incidenciaId = $(this).val();
            $("#TicketIncidenciaId").load("../incidencias/tipos/"+incidenciaId);
        });
        
        $("#TicketIncidenciaId").change(function(){ //se ejecuta con el evento onChange
            var tipoId = $(this).val();
            $.ajax({
                url: base_url+'/incidencia/incidencias/prioridad/'+tipoId,
                success: function(respuesta) {
                    $( "#TicketPrioridades" ).val(respuesta.Prioridade.nombre);
                    $( "#TicketPrioridadeId" ).val(respuesta.Prioridade.id);
                    console.log(respuesta.Prioridade.nombre);
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
        
        $('#TicketReporteFecha').datepicker({
            locale: 'es-es',
            format: 'dd-mm-yyyy',
            uiLibrary: 'bootstrap4'
        });