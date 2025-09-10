        $("#incidencia_nombre").change(function(){ //se ejecuta con el evento onChange
            var incidenciaId = $(this).val();
            $("#incidencia_tipo").load("../incidencias/tipos/"+incidenciaId);
        });
        
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
             //$("#cruce_id").val();
         })
        
    $(document).ready(function () {
        $('#fecha1').datepicker({
            locale: 'es-es',
            format: 'dd-mm-yyyy',
            uiLibrary: 'bootstrap4'
        });
        
        $('#fecha2').datepicker({
            locale: 'es-es',
            format: 'dd-mm-yyyy',
            uiLibrary: 'bootstrap4'
        });
        
        $("#tabla-ajax").load("resultAjax/");
    });
    
    