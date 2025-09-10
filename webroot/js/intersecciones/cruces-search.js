        $( "#cruceBusca" ).autocomplete({
            minLength: 2,
            source: '../cruces/autoCompletado',
            focus: function( event, ui )  { $( "#cruceBusca" ).val( ui.item.Cruce.codigo + " - " + ui.item.Cruce.nombre ); return false;},
            select: function( event, ui ) {
                $( "#cruce_id" ).val( ui.item.Cruce.id );
                return false;
            }//select
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
                    .data( "item.autocomplete", item )
                    .append( "<a>" + item.Cruce.codigo + " - " + item.Cruce.nombre + "</a>" )
                    .appendTo( ul );
        };//autocomplete
        
        $( "#via1Busca" ).autocomplete({
            minLength: 2,
            source: '../ejes/autoCompletado',
            focus: function( event, ui )  { $( "#via1Busca" ).val( ui.item.Eje.nombre_via ); return false;},
            select: function( event, ui ) {
                $( "#CruceVia1" ).val( ui.item.Eje.id );
                return false;
            }//select
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
                    .data( "item.autocomplete", item )
                    .append( "<a>" + item.Eje.nombre_via + "</a>" )
                    .appendTo( ul );
        };//autocomplete
        
        $('#buscar').click(function(){
            url = "resultAjax";
            $.ajax({
		type: "POST",
		url: url,
                data: $("#search").serialize()
            }).done(function( html ) {
		$("#tabla-ajax").html(html);
            });
        })
        
         $('#limpiar').click(function(event){
             $("#search")[0].reset();
             $("#search input:hidden").val('');
         })
        
    $(document).ready(function () {
        $("#tabla-ajax").load("resultAjax/");
    });
    
    