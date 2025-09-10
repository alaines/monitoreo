        $( "#CruceBusca" ).autocomplete({
            minLength: 2,
            source: '../proyectos/autoCompletado',
            focus: function( event, ui )  { $( "#CruceBusca" ).val( ui.item.Proyecto.nombre + " - " + ui.item.Proyecto.etapa ); return false;},
            select: function( event, ui ) {
                $( "#CruceProyectoId" ).val( ui.item.Proyecto.id );
                return false;
            }//select
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
                    .data( "item.autocomplete", item )
                    .append( "<a>" + item.Proyecto.nombre + " - " + item.Proyecto.etapa + "</a>" )
                    .appendTo( ul );
        };//autocomplete