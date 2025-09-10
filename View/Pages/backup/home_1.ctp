<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Bienvenido, <?php echo $this->Session->read('Auth.User')['Persona']['nombres']; ?></h2>
    </div>
</div>
<!--
<div class="row">
    <div class="col-lg-3">
        <iframe src="http://192.168.2.2/mjpg/video.mjpg?timestamp=1617667830969"></iframe>
    </div>
</div>
-->
<?php 
if($this->Session->read('Auth.User')['Grupo']['nombre' ] == "CONTEOS"): 
?>

<?php else: ?>
    <?php echo $this->element('Incidencia.estado_home', array('cache' => array('config' => 'largo')));?>
    <div class="row">
        <div class="col-lg-12" style="height: 500px; position: relative;" id="map_canvas"></div>
    </div>
    <script>
        function resize() {
            // Get elements and necessary element heights
            var headerHeight = 258;
            // Get view height
            var viewportHeight = $('body').innerHeight();
            altura = viewportHeight - headerHeight - 76;
            $('#map_canvas').innerHeight(altura);
        
            //Aqui seteamos las capas de mapas base.
            var mapbox = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYWxhaW5lcyIsImEiOiJjanNjYXZob3gwaXJpM3lsMXFza2txemNkIn0.u9qNnHc374n27lcWWZPPQg', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11'
            });

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
            var greenIcon = new prioridadIcon({iconUrl: origin+'/protransito/img/icono-mapa-green.png'}),
                redIcon = new prioridadIcon({iconUrl: origin+'/protransito/img/icono-mapa-red.png'}),
                orangeIcon = new prioridadIcon({iconUrl: origin+'/protransito/img/icono-mapa-orange.png'});

            //Aqui creamos la capa de tickets
            var tickets = L.layerGroup();

            $.getJSON("/protransito/incidencia/tickets/mapa.json", function (data) {
                $.each(data.tickets, function(i, item){
                    if(data.tickets[i].cruce === null){ data.tickets[i].cruce = 'CENTRO DE CONTROL';}
                    var texto = '<div class="text-center"><strong>'+data.tickets[i].cruce+'</strong> </div> <div class="text-center">'+data.tickets[i].incidencia+'</div><div class="text-center"><a href="/protransito/incidencia/tickets/detalle/'+data.tickets[i].id+'" target="_self" class="btn btn-info btn-sm">Ver incidencia</a></div>';
                    var marcador = redIcon;
                    if(data.tickets[i].prioridade === 'MEDIA'){ marcador = orangeIcon;}
                    if(data.tickets[i].prioridade === 'BAJA'){ marcador = greenIcon;}
                    if(data.tickets[i].lat === null && data.tickets[i].lng === null){data.tickets[i].lat = -12.050017807053846; data.tickets[i].lng = -77.03181092332049;}
                    L.marker([data.tickets[i].lat, data.tickets[i].lng], {icon: marcador}).bindPopup(texto).addTo(tickets);
                });

            });

            //Aqui seteamos los valors por defecto del mapa
            var map = L.map('map_canvas',{
                center : [-12.08173, -77.02300],
                zoom : 11,
                layers : [mapbox, tickets]
            });

            //Las variables de los mapas base y de capas secundarias
            var baseMaps = {
                Mapbox : mapbox,
            };

            var overlayMaps = {
                Incidencias : tickets,
            };

            //Agregamos todo al mapa
            L.control.layers(baseMaps, overlayMaps).addTo(map);
            
        }

        $(document).ready(resize);

    </script>
<?php endif;?>