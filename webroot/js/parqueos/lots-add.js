/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

      
        const map = L.map('map_add').setView([-12.08173, -77.02300], 20);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18
        }).addTo(map);
        
        const drawnItems = new L.FeatureGroup();
    
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            edit: {
                featureGroup: drawnItems
            },
            draw: {
                polygon: true,
                marker: false,
                polyline: false,
                rectangle: false,
                circle: false,
                circlemarker: false
            }
        });
        map.addControl(drawControl);

        map.on('draw:created', function (e) {
            const layer = e.layer;
            drawnItems.addLayer(layer);

            // Obtener los puntos del polígono
            const coords = layer.getLatLngs()[0].map(latlng => [latlng.lat, latlng.lng]);

            // Enviar por AJAX a tu controlador CakePHP
            fetch('/poligonos/guardar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                //'X-CSRF-Token': '<?= $this->request->getParam('_csrfToken') ?>' // si usas el SecurityComponent
            },
            body: JSON.stringify({ coordenadas: coords })
            });
        });