// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#personasIndex').DataTable({
            language: {
                url: '/incidencias/vendor/datatables/es_ES.json'
            }
        });
        
    $('.view').tooltip();
    $('.edit').tooltip();
    $('.reset').tooltip();
        
});