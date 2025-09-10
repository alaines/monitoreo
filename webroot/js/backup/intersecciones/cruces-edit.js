        $( "#via1Busca" ).autocomplete({
            minLength: 2,
            source: '../../ejes/autoCompletado',
            focus: function( event, ui )  { $( "#via1Busca" ).val( ui.item.Eje.nombre_via ); return false;},
            select: function( event, ui ) {
                $( "#CruceVia1" ).val( ui.item.Eje.id );
                return false;
            }//select
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
                    .data( "item.autocomplete", item )
                    .append( "<a>" + item.Eje.nombre_via + "</a>" )
                    .appendTo( ul );
        };//autocomplete

        $( "#via2Busca" ).autocomplete({
            minLength: 2,
            source: '../../ejes/autoCompletado',
            focus: function( event, ui )  { $( "#via2Busca" ).val( ui.item.Eje.nombre_via ); return false;},
            select: function( event, ui ) {
                $( "#CruceVia2" ).val( ui.item.Eje.id );
                return false;
            }//select
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
                    .data( "item.autocomplete", item )
                    .append( "<a>" + item.Eje.nombre_via + "</a>" )
                    .appendTo( ul );
        };//autocomplete
        
        lati = $('#CruceLatitud').val();
        long = $('#CruceLongitud').val();
        
        var mapAdd = L.map('map_add').setView([lati,long], 18);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYWxhaW5lcyIsImEiOiJjanNjYXZob3gwaXJpM3lsMXFza2txemNkIn0.u9qNnHc374n27lcWWZPPQg', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 22,
            id: 'mapbox/streets-v11'
        }).addTo(mapAdd);
        
        var greenIcon = L.icon({
            iconUrl: '../../../img/semaforo.png',
            iconSize:     [50, 50], // size of the icon
            iconAnchor:   [25, 49], // point of the icon which will correspond to marker's location
            popupAnchor:  [0, -48] // point from which the popup should open relative to the iconAnchor
        });

        marca = new L.marker([lati,long], {draggable:'true',icon: greenIcon}).bindPopup("<input type='button' value='Borrar Marcador' class='btn btn-info btn-sm marker-delete-button'/>");
        marca.on("popupopen", onPopupOpen);
        mapAdd.addLayer(marca);
        
        function onMapClick(e) {
            marker = new L.marker(e.latlng, {draggable:'true',icon: greenIcon}).bindPopup("<input type='button' value='Borrar Marcador' class='btn btn-info btn-sm marker-delete-button'/>");;
            marker.on('dragend', function(event){
              var marker = event.target;
              var position = marker.getLatLng();
              marker.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
              mapAdd.panTo(new L.LatLng(position.lat, position.lng));
              $('#CruceLatitud').val(position.lat);
              $('#CruceLongitud').val(position.lng);
            });
            marker.on("popupopen", onPopupOpen);
            mapAdd.addLayer(marker);
            $('#CruceLatitud').val(e.latlng.lat);
            $('#CruceLongitud').val(e.latlng.lng);
          };

        mapAdd.on('click', onMapClick);
        
        function onPopupOpen() {
            var tempMarker = this;
            $(".marker-delete-button:visible").click(function () {
                mapAdd.removeLayer(tempMarker);
                $('#CruceLatitud').val('');
                $('#CruceLongitud').val('');
            });
        }