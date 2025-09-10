
<?php if($this->Session->read('Auth.User')['Grupo']['nombre' ] == "CONTEOS"): ?>

<?php else: ?>
    <div class="row">
        <div class="col-lg-12" style="height: 500px; position: relative;" id="map_canvas"></div>
    </div>
    <script>
       
        //Aqui seteamos las capas de mapas base.
            var mapbox = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYWxhaW5lcyIsImEiOiJjanNjYXZob3gwaXJpM3lsMXFza2txemNkIn0.u9qNnHc374n27lcWWZPPQg', {
                attribution: 'Map data &copy; <a href="https://www.mapbox.com/">Mapbox</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11'
            });
            
            var os = L.tileLayer(
                    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
                        maxZoom: 18
            });
        
        //Aqui creamos la capa de tickets
            var parkings = L.layerGroup();
            var lots = L.layerGroup();
            var bikeways = L.layerGroup();
            
        //Aqui seteamos los valores por defecto del mapa
            var map = L.map('map_canvas',{
                center : [-12.067903, -77.048506],
                zoom : 19,
                layers : [os, parkings, lots, bikeways],
                preferCanvas: true
            });
            
        //Las variables de los mapas base y de capas secundarias
            var baseMaps = {
                Openstreetmap : os,
                Mapbox : mapbox
            };

            var overlayMaps = {
                Zonas : parkings,
                Parqueos : lots,
                Ciclovias : bikeways
            };
            
        function mapa(){
            //variables de imagenes de los iconos y sus propiedades.
            var prioridadIcon = L.Icon.extend({
                options: {
                    iconSize:     [50, 55],
                    iconAnchor:   [25, 55],
                    shadowAnchor: [4, 62],
                    popupAnchor:  [0, -50]
                }
            });
            //Parking 1
            var polygon = L.polygon([
                [-12.067723, -77.048624],
                [-12.067760, -77.048651],
                [-12.067978, -77.048366],
                [-12.067939, -77.048355]
            ]).addTo(parkings).bindPopup("Av. Brasil / Av. Orbegozo");
            
            var origin = $(location).attr('origin');
            var greenIcon = new prioridadIcon({iconUrl: origin+'<?php echo $this->webroot; ?>img/lot_false.png'}),
                redIcon = new prioridadIcon({iconUrl: origin+'<?php echo $this->webroot; ?>img/lot_true.png'});

            $.getJSON("<?php echo $this->webroot; ?>parqueo/lots/mapa.json", function (data) {
                $.each(data.lotsLastState, function(i, item){
                    if(data.lotsLastState[i].lastState === true){ 
                        marcador = redIcon;
                        var texto = '<div class="text-center"><strong> Estacionamiento: '+data.lotsLastState[i].code+'</strong> </div> <div class="text-center">Ocupado desde: '+data.lotsLastState[i].lastStateCreated+'</div>';
                    }  else {
                        marcador = greenIcon;
                        var texto = '<div class="text-center"><strong> Estacionamiento: '+data.lotsLastState[i].code+'</strong> </div> <div class="text-center">Libre desde: '+data.lotsLastState[i].lastStateCreated+'</div>';
                    }
                    var punto = L.marker([data.lotsLastState[i].lat, data.lotsLastState[i].lng], {icon: marcador}).bindPopup(texto);
                    punto.addTo(lots);
                });
            });
        }
        
        function refreshMap(){
            L.layerGroup().clearLayers();
            mapa();
        }

        $(document).ready(function(){
            resize();
            mapa();
            //Agregamos todo al mapa
            L.control.layers(baseMaps, overlayMaps, { collapsed:false }).addTo(map);
            setInterval(refreshMap,5000);
            $.ajaxSetup({cache: false});        
        });

    </script>
<?php endif;?>
