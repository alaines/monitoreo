<div class="row">
        <div class="col-lg-12" style="height: 800px; position: relative;" id="map_canvas"></div>
    </div>
    <script>
       
        //Aqui seteamos las capas de mapas base.
            var mapbox = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYWxhaW5lcyIsImEiOiJjanNjYXZob3gwaXJpM3lsMXFza2txemNkIn0.u9qNnHc374n27lcWWZPPQg', {
                attribution: 'Map data &copy; <a href="https://www.mapbox.com/">MapBox</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 20,
                id: 'mapbox/streets-v11'
            });
            
            var os = L.tileLayer(
                    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        maxZoom: 20
            });
        //Aqui creamos la capa de tickets
            var protransito = L.layerGroup();
            var atu = L.layerGroup();
            var sit = L.layerGroup();
            var otros = L.layerGroup();
            
        //Aqui seteamos los valores por defecto del mapa
            var map = L.map('map_canvas',{
                center : [-12.0469, -77.0317],
                zoom : 11,
                layers : [os, protransito, atu, sit, otros],
                preferCanvas: true
            });

        //Instanciamos capa (layer) KMZ
            var kmz = L.kmzLayer().addTo(map);
        
        //Las variables de los mapas base y de capas secundarias
            var baseMaps = {
                Openstreetmap : os,
                Mapbox : mapbox
            };

            var overlayMaps = {
                PROTRANSITO : protransito,
                ATU : atu,
                SIT : sit,
                OTROS: otros
            };
            
        function mapa(){
            // Suma de altura de elementos en el body
            var headerHeight = 94;
            // Altura total del Body
            var viewportHeight = $('body').innerHeight();
            altura = viewportHeight - headerHeight - 76;
            console.log(altura);
            $('#map_canvas').innerHeight(altura);
            
            //variables de imagenes de los iconos y sus propiedades.
            var prioridadIcon = L.Icon.extend({
                options: {
                    iconSize:     [35, 48],
                    iconAnchor:   [20, 55],
                    shadowAnchor: [4, 62],
                    popupAnchor:  [0, -50]
                }
            });
            
            var origin = $(location).attr('origin');
            var protransitoIcon = new prioridadIcon({iconUrl: origin+'<?php echo $this->webroot; ?>img/icono_mapa_protransito.png'}),
                atuIcon = new prioridadIcon({iconUrl: origin+'<?php echo $this->webroot; ?>img/icono_mapa_atu.png'}),
                sitIcon = new prioridadIcon({iconUrl: origin+'<?php echo $this->webroot; ?>img/icono_mapa_sit.png'}),
                otrosIcon = new prioridadIcon({iconUrl: origin+'<?php echo $this->webroot; ?>img/icono_mapa_otros.png'});

            $.getJSON("<?php echo $this->webroot; ?>intersecciones/cruces/mapa.json", function (data) {
                $.each(data.cruces, function(i, item){
                    var texto = '<div class="text-center"><strong>'+data.cruces[i].cruce+'</strong> </div> <div class="text-center">'+data.cruces[i].codigo+'</div><div class="text-center"><a href="/protransito/intersecciones/cruces/detalle/'+data.cruces[i].id+'" target="_self" class="btn btn-info btn-sm">Ver detalle</a></div>';
                    var marcador = otrosIcon;
                    if(data.cruces[i].capa === 1){ marcador = protransitoIcon;}
                    if(data.cruces[i].capa === 2){ marcador = atuIcon;}
                    if(data.cruces[i].capa === 3){ marcador = sitIcon;}
                    var punto = L.marker([data.cruces[i].lat, data.cruces[i].lng], {icon: marcador}).bindPopup(texto);
                    switch(data.cruces[i].capa){
                        case 1:
                            punto.addTo(protransito);
                            break;
                        case 2:
                            punto.addTo(sit);
                            break;    
                        case 3:
                            punto.addTo(atu);
                            break;    
                        default:
                            punto.addTo(otros);
                    }
                });
            });
            
            kmz.on('load', function(e) {
                control.addOverlay(e.layer, e.name);
                // e.layer.addTo(map);
            });
             
            kmz.load('/protransito/files/kmz/RED');
            var control = L.control.layers(baseMaps, overlayMaps, { collapsed:false }).addTo(map);
        }
        
        function redimensiona() {
            // Suma de altura de elementos en el body
            var headerHeight = 94;
            // Altura total del Body
            var viewportHeight = $('body').innerHeight();
            altura = viewportHeight - headerHeight - 76;
            $('#map_canvas').innerHeight(altura);
            console.log('redimensionada');
        }

        $(document).ready(function(){
            //redimensiona();
            mapa();
            //Agregamos todo al mapa
            
        });

    </script>