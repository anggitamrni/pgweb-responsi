<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Destination</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="images/coconut-tree.svg" type="image/svg" />

    <!-- Search CSS Library -->
    <link rel="stylesheet" href="assets/plugins/leaflet-search/leaflet-search.css" />

    <!-- Geolocation CSS Library for Plugin -->
    <link rel="stylesheet"
        href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css" />

    <!-- Leaflet Mouse Position CSS Library -->
    <link rel="stylesheet" href="assets/plugins/leaflet-mouseposition/L.Control.MousePosition.css" />

    <!-- Leaflet Measure CSS Library -->
    <link rel="stylesheet" href="assets/plugins/leaflet-measure/leaflet-measure.css" />

    <!-- EasyPrint CSS Library -->
    <link rel="stylesheet" href="assets/plugins/leaflet-easyprint/easyPrint.css" />

    <!-- Tab browser icon -->
    <link rel="icon" type="image/x-icon" href="http://luk.staff.ugm.ac.id/logo/UGM/Resmi/Warna.gif">

    <!-- Marker Cluster -->
    <link rel="stylesheet" href="assets/plugins/leaflet-markercluster/MarkerCluster.css">
    <link rel="stylesheet" href="assets/plugins/leaflet-markercluster/MarkerCluster.Default.css">

    <!--Routing-->
    <link rel="stylesheet" href="assets/plugins/leaflet-routing/leaflet-routing-machine.css" />
    <style>
        #map {
            height: 97.5vh;
        }

        *.info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            text-align: center;
        }

        .info h2 {
            margin: 0 0 5px;
            color: #777;
        }

        body {
            background-color: rgba(231, 238, 160, 0.171);
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #aea1a1;
            /* Warna latar belakang navbar */
            padding: 10px;
        }

        nav a {
            color: white;
            /* Warna teks */
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
        }

        nav a:hover {
            background-color: #bea9a9;
            /* Warna latar belakang saat hover */
        }
    </style>
</head>

<body>
    <nav>
        <a href="dashboard.html">Home</a>
        <a href="objekwisata.html">Deskripsi Wisata</a>
        <a href="culinary.html">Culinary</a>
    </nav>

    <body>
        <div class="container">
            <div class="card mt-4 shadow">
                <div class="card-header text-center">
                    <h1> </i> Destinasi Kota Denpasar Bali</h1>
                </div>
    </body>

    <div id="map"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- Search JavaScript Library -->
    <script src="assets/plugins/leaflet-search/leaflet-search.js"></script>

    <!-- Geolocation Javascript Library -->
    <script
        src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>

    <!-- Leaflet Mouse Position JavaScript Library -->
    <script src="assets/plugins/leaflet-mouseposition/L.Control.MousePosition.js"></script>

    <!-- Leaflet Measure JavaScript Library -->
    <script src="assets/plugins/leaflet-measure/leaflet-measure.js"></script>

    <!-- EasyPrint JavaScript Library -->
    <script src="assets/plugins/leaflet-easyprint/leaflet.easyPrint.js"></script>

    <!-- Marker Cluster -->
    <script src="assets/plugins/leaflet-markercluster/leaflet.markercluster.js"></script>
    <script src="assets/plugins/leaflet-markercluster/leaflet.markercluster-src.js"></script>

    <!--Routing-->
    <script src="assets/plugins/leaflet-routing/leaflet-routing-machine.js"></script>
    <script src="assets/plugins/leaflet-routing/leaflet-routing-machine.min.js"></script>

    <script>
        var gktourism = L.geoJson(null, {
            pointToLayer: function (feature, latlng) {
                return L.marker(latlng, {

                });
            },
            onEachFeature: function (feature, layer) {
                var content = "Nama Kecamatan : " + feature.properties.NAMOBJ + "<br>" +
                    "<img src= 'images/logo.png' width='50', height='50'>";

                layer.on({
                    click: function (e) {
                        gktourism.bindPopup(content).openPopup();
                    },
                    mouseover: function (e) {
                        gktourism
                            .bindTooltip(feature.properties.kecamatan)
                            .openTooltip();
                    },
                    mouseout: function (e) {
                        gktourism.closePopup();
                        gktourism.closeTooltip();
                    },
                });
            },
        });


        $.getJSON("gktourism.php", function (data) {
            gktourism.addData(data);
            map.addLayer(gktourism);
            map.fitBounds(gktourism.getBounds());

            // Style and Popup handling
            gktourism.eachLayer(function (layer) {
                var aktif = layer.feature.properties.aktif;

                // Apply styling based on aktif property
                if (aktif > 94 && aktif <= 295) {
                    layer.setStyle({
                        fillColor: '#ffd0bb',
                        fillOpacity: 1,
                        weight: 1
                    });
                } else if (aktif > 296 && aktif <= 530) {
                    layer.setStyle({
                        fillColor: '#ff7f50',
                        color: '#232323',
                        fillOpacity: 1,
                        weight: 1
                    });
                } else if (aktif > 531 && aktif <= 941) {
                    layer.setStyle({
                        fillColor: '#b22222',
                        color: '#232323',
                        fillOpacity: 1,
                        weight: 1
                    });
                }

            });
        })

        // Inisialisasi Peta
        var map = L.map("map").setView([-8.6500, 115.2167], 13);

        /* Image Legend */
        L.Control.Legend = L.Control.extend({
            onAdd: function (map) {
                var img = L.DomUtil.create('img');

                img.style.width = '175px';
                return img;
            }
        });

        L.control.Legend = function (opts) {
            return new L.Control.Legend(opts);
        }
        L.control.Legend({ position: 'bottomleft' }).addTo(map);


        /* Image Logo */
        L.Control.Watermark = L.Control.extend({
            onAdd: function (map) {
                var img = L.DomUtil.create('img');
                img.src = '';
                img.style.width = '150px';
                return img;
            }
        });

        L.control.Watermark = function (opts) {
            return new L.Control.Watermark(opts);
        }

        L.control.Watermark({ position: 'topleft' }).addTo(map);

        // /* Tile Basemap */ (note: pilihan basemap diakses pada https://leaflet-extras.github.io/leaflet-providers/preview/)
        var basemap1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> | <a href="DIVSIG UGM" target="_blank">DIVSIG UGM</a>' //menambahkan nama//
        });

        var OpenStreetMap_Mapnik = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        var basemap2 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri | <a href="Latihan WebGIS" target="_blank">DIVSIG UGM</a>'
        });

        var basemap3 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri | <a href="Lathan WebGIS" target="_blank">DIVSIG UGM</a>'
        });

        var basemap4 = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
        });
        var basemap5 = L.tileLayer('https://tiles.stadiamaps.com/tiles/stamen_watercolor/{z}/{x}/{y}.{ext}', {
            minZoom: 1,
            maxZoom: 16,
            attribution: '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://www.stamen.com/" target="_blank">Stamen Design</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            ext: 'jpg'
        });
        var basemap6 = L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
            maxZoom: 20,
            attribution: '<a href="https://github.com/cyclosm/cyclosm-cartocss-style/releases" title="CyclOSM - Open Bicycle render">CyclOSM</a> | Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
        var basemap7 = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 17,
            attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
        });
        var basemap8 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; National Geographic, Esri, DeLorme, NAVTEQ, UNEP-WCMC, USGS, NASA, ESA, METI, NRCAN, GEBCO, NOAA, iPC',
            maxZoom: 16
        });

        basemap4.addTo(map);

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "penduduk";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM data";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $lat = $row["latitude"];
                $long = $row["longitude"];
                $info = $row["wisata_denpasar"];
                // $gambar = $row["nama"];
                echo "L.marker([$lat, $long]).addTo(map).bindPopup('$info');";
            } 
        }
        else {
            echo "0 results";
        }
            $conn->close();
    ?>

        /* Control Layer */
        var baseMaps = {
            "OpenStreetMap": basemap1,
            "Esri World Street": basemap2,
            "Esri Imagery": basemap3,
            "Stadia Dark Mode": basemap4,
            "Stadia Stamen Waterolor": basemap5,
            "CyclOSM": basemap6,
            "Open Topo Map": basemap7,
            "Esri_NatGeoWorldMap": basemap8
        };

        var overlayMaps = {

        };

        L.control.layers(baseMaps, overlayMaps, { collapsed: false }).addTo(map);

         // Plugin Search
         var searchControl = new L.Control.Search({
            position: "topleft",
            layer: gktourism, //Nama variabel layer
            propertyName: "NAMOBJ", //Field untuk pencarian
            marker: false,
            moveToLocation: function (latlng, title, map) {
                var zoom = map.getBoundsZoom(latlng.layer.getBounds());
                map.setView(latlng, zoom);
            },
        });
        searchControl
            .on("search:locationfound", function (e) {
                e.layer.setStyle({
                    fillColor: "#ffff00",
                    color: "#0000ff",
                });
            })
            .on("search:collapse", function (e) {
                featuresLayer.eachLayer(function (layer) {
                    featuresLayer.resetStyle(layer);
                });
            });
        map.addControl(searchControl);

        /*Plugin Geolocation */
        var locateControl = L.control
            .locate({
                position: "topleft",
                drawCircle: true,
                follow: true,
                setView: true,
                keepCurrentZoomLevel: false,
                markerStyle: {
                    weight: 1,
                    opacity: 0.8,
                    fillOpacity: 0.8,
                },
                circleStyle: {
                    weight: 1,
                    clickable: false,
                },
                icon: "fas fa-crosshairs",
                metric: true,
                strings: {
                    title: "Click for Your Location",
                    popup: "You're here. Accuracy {distance} {unit}",
                    outsideMapBoundsMsg: "Not available",
                },
                locateOptions: {
                    maxZoom: 16,
                    watch: true,
                    enableHighAccuracy: true,
                    maximumAge: 10000,
                    timeout: 10000,
                },
            })
            .addTo(map);

        /*Plugin Mouse Position Coordinate */
        L.control
            .mousePosition({
                position: "bottomright",
                separator: ",",
                prefix: "Point Coodinate: ",
            })
            .addTo(map);

        /* Layer Marker */
        var addressPoints = [
            
        ]

        var markers = L.markerClusterGroup();

        for (var i = 0; i < addressPoints.length; i++) {
            var a = addressPoints[i];
            var title1 = a[2];
            var marker = L.marker(new L.LatLng(a[0], a[1]), {
                title: title1
            });

            marker.bindPopup(title1);
            markers.addLayer(marker);
        }

        map.addLayer(markers);

    </script>
    <div class="text-center mt-2">
        <small class="text-secondary">Copyright © 2023 Denpasar Torism All right reserved</small>
    </div>

</body>

</html>