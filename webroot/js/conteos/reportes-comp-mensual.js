$(document).ready(function(){
    HoldOn.close();
    $('#comprobar').on('click', function(){
        code = $("#ReportePmedidaNumero").val();
        year = $("#ReporteYear").val();
        month = $("#ReporteMonth").val();
        if(code == ''|| year == '' || month == ''){
            alert('Debe seleccionar todos los campos');
            return false;
        };
        var options = {
            theme:"sk-cube-grid",
            message:'estamos procesando su información, espere un momento.. ',
            backgroundColor:"#1b477c",
            textColor:"white"
        };
        HoldOn.open(options);        
        
        /**
        $form = $('#ReporteComparativoMensualForm');
        var form = $form.serialize();
      
        $.ajax({
            type: "POST",
            url: "/protransito/conteo/estadisticas/comparativoMensual",
            data: form,
            cache: false,
            success: function(data) {
                
                //Cargamos finalmente el contenido deseado
                $('#content-request').fadeIn(1000).html(data);
            }
        });
        return false;
        */
    });
});
// Limita la cantidad de opciones seleccionadas en el slect multiple
$("#ReporteYear").on('change', function(e) {
    if (Object.keys($(this).val()).length > 3) {
        $('option[value="' + $(this).val().toString().split(',')[2] + '"]').prop('selected', false);
    }
});
$( "#pmedidaBusca" ).autocomplete({
            minLength: 2,
            source: '../pmedidas/autoCompletado',
            focus: function( event, ui )  { $( "#pmedidaBusca" ).val( ui.item.Pmedida.numero + " - " + ui.item.Pmedida.descripcion ); return false;},
            select: function( event, ui ) {
                $( "#ReportePmedidaNumero" ).val( ui.item.Pmedida.numero );
                return false;
            }//select
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
                    .data( "item.autocomplete", item )
                    .append( "<a>" + item.Pmedida.numero + " - " + item.Pmedida.descripcion + "</a>" )
                    .appendTo( ul );
        };//autocomplete