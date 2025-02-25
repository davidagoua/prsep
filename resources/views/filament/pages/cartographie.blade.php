@push('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script >

        function getColor(d) {
            if(d === undefined){
                return "transparent"
            }

            return d > 10000000 ? '#800026' :
                d > 20000000  ? '#BD0026' :
                    d > 30000000  ? '#E31A1C' :
                        d > 40000000  ? '#FC4E2A' :
                            d > 50000000   ? '#FD8D3C' :
                                d > 60000000   ? '#FEB24C' :
                                    d === 70000000   ? '#FED976' :
                                        '#faf8f3';
        }

        var map = L.map('map').setView([7.4431411, -5.4659087], 7);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        let geoinfo = JSON.parse(@json($this->dept_geojson));
        let count_dept = @js($this->tableauLocalites);

        console.log(count_dept)
        L.geoJSON(geoinfo, {
            style: function(feature){
                return {
                    weight: 2,
                    color: 'grey',
                    opacity: 0.5,
                    fillColor: getColor(count_dept[feature.properties.nomdept] ?? ""),
                    fillOpacity: 0.5
                };
            },
            onEachFeature: function (feature, layer) {
                layer.on('click', function () {
                    const properties = feature.properties;
                    const modalContent = JSON.stringify(properties, null, 2);
                    console.log(properties)
                    console.log(count_dept[feature.nomdept])

                });
                layer.bindPopup(`<h1>${feature.properties.nomdept}</h1><p>Montant prevu: ${count_dept[feature.properties.nomdept] ?? 0} CFA </br><a>
                Voir plus</a></p>`)
            }
        }).addTo(map);



    </script>
@endpush


<x-filament-panels::page >
    <div class="flex space-x-2">
        <div class="w-1/3 bg-white border p-3">
            {{ $this->form }}

        </div>
        <div class="w-2/3">
            <div style="height: 600px" class="w-full border" id="map"></div>
        </div>
    </div>


</x-filament-panels::page>

