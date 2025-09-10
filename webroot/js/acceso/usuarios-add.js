$(document).ready(function() {
        $('#comprobarUsuario').attr("disabled", true);
        
        $('#UserUsuario').blur(function(){
            var usuario = $(this).val();
            if(usuario == ''){
                alert('No se puede dejar usuario en blanco');
                return false;
            }
            $.ajax({
                type: "GET",
                url: "verificaUsuario/"+usuario,
                success: function(data) {
                    //Cargamos finalmente el contenido deseado
                    if (data.indexOf("no") >= 0){
                        $("button[type=submit]").attr("disabled", true);
                    } else {
                        $("button[type=submit]").removeAttr("disabled");
                    }
                    $('#respuestaUsuario').fadeIn("slow").html(data);
                }
            });
        });
        
        $('#UsuarioGrupoId').change(function(){
            var grupo = $(this).val();
            $.ajax({
                type: "GET",
                url: "../grupos/datos/"+grupo,
                    success: function(data) {
                    $('#dataGrupos').fadeIn("slow").html(data);
                    }
            });
        });
        
        $('#PersonaFecnac').datepicker({
            locale: 'es-es',
            format: 'dd-mm-yyyy',
            uiLibrary: 'bootstrap4'
        });
        
        $("#comprobarUsuario").click(function(){
            if($("#PersonaNumDoc").val()== ''){
                alert('Debe ingresar DNI');
                return false;
            } else if( isNaN($("#PersonaNumDoc").val()) ){
                alert('DNI debe ser un numero.');
                return false;
            } else if ( /\s/.test($("#PersonaNumDoc").val())){
                alert('DNI no debe contener espacios.');
                return false;				
            };
        });
});
        
        