var getUrl = window.location;
var base_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
$(document).ready(function() {
    $('#ticketsDetalle').DataTable({
            language: {
                url: base_url+'/vendor/datatables/es_ES.json'
            }
        });
        
    $('.view').tooltip();
    $('.edit').tooltip();
});
