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
        $form = $('#ReporteMensualForm');
        var form = $form.serialize();
        //Añadimos la imagen de carga en el contenedor
        //$('#content').html('<div class="loading"><img src="/protransito/img/ajax-loader.gif" alt="loading" /><br/>Un momento, por favor...</div>');
        ;
        
        $.ajax({
            type: "POST",
            url: "/protransito/conteo/estadisticas/mensual",
            data: form,
            cache: false,
            success: function(data) {
                HoldOn.close();
                $('#content-request').fadeIn(1000).html(data);
            }
        });
        return false;
         * 
         */
    });
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