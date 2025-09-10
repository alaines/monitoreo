function borrar(ide){
    $.ajax({
        type: "POST",
        url: "delete",
            data: { id: ide }
    }).done(function( msg ) {
        alert("Menu Borrado");
        location.reload();
    });
}