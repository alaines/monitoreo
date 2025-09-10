<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Bienvenido, <?php echo $this->Session->read('Auth.User')['Persona']['nombres']; ?></h2>
    </div>
</div>
<?php 
if($this->Session->read('Auth.User')['Grupo']['nombre' ] == "CONTEOS"): 
?>

<?php else: ?>
    <?= $this->element('Incidencia.estado_home', array('cache' => array('config' => 'largo')));?>
    <div class="row">
        <div class="col-lg-12" style="height: 500px; position: relative;" id="map_canvas"></div>
    </div>
    <script>
       
        //Aqui seteamos las capas de mapas base.
            var mapbox = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYWxhaW5lcyIsImEiOiJjanNjYXZob3gwaXJpM3lsMXFza2txemNkIn0.u9qNnHc374n27lcWWZPPQg', {
                attribution: 'Map data &copy; <a href="https://www.mapbox.com/">Mapbox</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 20,
                id: 'mapbox/streets-v11'
            });
            
            var os = L.tileLayer(
                    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
                        maxZoom: 20
            });
        
        //Aqui creamos la capa de tickets
            var gmuc = L.layerGroup();
            var gmunc = L.layerGroup();
            var atu = L.layerGroup();
            var distrital = L.layerGroup();
            var rutas = L.layerGroup();
            var linea = L.layerGroup();
            var otros = L.layerGroup();
            
        //Aqui seteamos los valores por defecto del mapa
            var map = L.map('map_canvas',{
                center : [-12.0469, -77.0317],
                zoom : 11,
                layers : [os, gmuc, gmunc, atu, distrital, rutas, linea, otros],
                preferCanvas: true
            });
            
        //Las variables de los mapas base y de capas secundarias
            var baseMaps = {
                Openstreetmap : os,
                Mapbox : mapbox
            };

            var overlayMaps = {
                GMUC : gmuc,
                GMUNC : gmunc,
                ATU : atu,
                DISTRITAL : distrital,
                RUTAS: rutas,
                LINEA: linea,
                OTROS : otros
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
            
            var origin = $(location).attr('origin');
            var greenIcon = new prioridadIcon({iconUrl: origin+'<?php echo $this->webroot; ?>img/icono-mapa-green.png'}),
                redIcon = new prioridadIcon({iconUrl: origin+'<?php echo $this->webroot; ?>img/icono-mapa-red.png'}),
                orangeIcon = new prioridadIcon({iconUrl: origin+'<?php echo $this->webroot; ?>img/icono-mapa-orange.png'});

            $.getJSON("<?php echo $this->webroot; ?>incidencia/tickets/mapa.json", function (data) {
                $.each(data.tickets, function(i, item){
                    if(data.tickets[i].cruce === null){ data.tickets[i].cruce = 'CENTRO DE CONTROL';}
                    if(data.tickets[i].capa === null){ data.tickets[i].capa = 100;}
                    var texto = '<div class="text-center"><strong>'+data.tickets[i].cruce+'</strong> </div> <div class="text-center">'+data.tickets[i].incidencia+'</div><div class="text-center"><a href="<?php echo $this->webroot; ?>incidencia/tickets/detalle/'+data.tickets[i].id+'" target="_self" class="btn btn-info btn-sm">Ver incidencia</a></div>';
                    var marcador = redIcon;
                    if(data.tickets[i].prioridade === 'MEDIA'){ marcador = orangeIcon;}
                    if(data.tickets[i].prioridade === 'BAJA'){ marcador = greenIcon;}
                    if(data.tickets[i].lat === null && data.tickets[i].lng === null){data.tickets[i].lat = -12.050017807053846; data.tickets[i].lng = -77.03181092332049;}
                    var punto = L.marker([data.tickets[i].lat, data.tickets[i].lng], {icon: marcador}).bindPopup(texto);
                    console.log(data.tickets[i]);
                    switch(data.tickets[i].capa){
                        case 1:
                            punto.addTo(gmuc);
                            break;
                        case 2:
                            punto.addTo(gmunc);
                            break;    
                        case 3:
                            punto.addTo(atu);
                            break;   
                        case 4:
                            punto.addTo(distrital);
                            break;
                        case 5:
                            punto.addTo(rutas);
                            break;
                        case 6:
                            punto.addTo(linea);
                            break;
                        default:
                            punto.addTo(otros);
                    }
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
            setInterval(refreshMap,180000);
            $.ajaxSetup({cache: false});        
        });

    </script>
<?php endif;?>