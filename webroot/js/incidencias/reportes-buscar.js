var getUrl = window.location;
var base_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

        $("#incidencia_nombre").change(function(){ //se ejecuta con el evento onChange
            var incidenciaId = $(this).val();
            $("#incidencia_tipo").load("../incidencias/tipos/"+incidenciaId);
        });
        
        $( "#cruceBusca" ).autocomplete({
            minLength: 2,
            source: base_url+'/intersecciones/cruces/autoCompletado',
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
            var options = {
                theme:"sk-cube-grid",
                message:'estamos procesando su información, espere un momento.. ',
                backgroundColor:"#1b477c",
                textColor:"white"
            };
            HoldOn.open(options);
            url = "resultAjax";
            $.ajax({
		        type: "POST",
		        url: url,
                data: $("#search").serialize()
            }).done(function( html ) {
                HoldOn.close();
		        $("#tabla-ajax").html(html);
            });
        })
        
         $('#limpiar').click(function(event){
             $("#search")[0].reset();
             $("#search input:hidden").val('');
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

        $('#reportesIndex').DataTable({
            language: {
                url: base_url+'/vendor/datatables/es_ES.json'
            }
        });
        
    });
    
    