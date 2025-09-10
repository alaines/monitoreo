$(document).ready(function(){
    $('#back').click(function(){
        parent.history.back();
        return false;
    });
});

function resize() {
    // Suma de altura de elementos en el body
    var headerHeight = 258;
    // Altura total del Body
    var viewportHeight = $('body').innerHeight();
    altura = viewportHeight - headerHeight - 76;
    $('#map_canvas').innerHeight(altura);
    console.log('redimensionada');
}

$('.view').tooltip();
$('.edit').tooltip();