// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#userIndex').DataTable({
            language: {
                url: '/incidencias/vendor/datatables/es_ES.json'
            }
        });
        
    $('.view').tooltip();
    $('.edit').tooltip();
    $('.reset').tooltip();
        
});

function realizaProceso(id){
    $.ajax({
        url:   "usuarios/resetPassword/"+id,
        type:  "get",
        beforeSend: function () {
            alert("Est\xe1 seguro?");
        },
        success:  function (data) {
            alert(data);
        }
    });
}