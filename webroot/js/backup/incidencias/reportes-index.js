$(document).ready(function () {
    
    //$("#ReporteDiarioForm")[0].reset();
    
    $('#ReporteFecha1').datepicker({
        locale: 'es-es',
        format: 'dd-mm-yyyy',
        uiLibrary: 'bootstrap4'
    });
    
    $('#ReporteFecha2').datepicker({
        locale: 'es-es',
        format: 'dd-mm-yyyy',
        uiLibrary: 'bootstrap4'
    });
    
});