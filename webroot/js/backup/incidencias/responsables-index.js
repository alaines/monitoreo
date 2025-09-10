$(document).ready(function() {
    $('#responsablesIndex').DataTable({
            language: {
                url: '/incidencias/vendor/datatables/es_ES.json'
            },
            order: [[ 0, "asc" ]]
    });
});