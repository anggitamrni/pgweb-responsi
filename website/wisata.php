<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Covid19 Sleman</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            background-color: rgba(16, 154, 200, 0.171);
        }

        .navbar {
            overflow: hidden;
            background-color: #333;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar a.active {
            background-color: #4CAF50;
            color: white;
        }

        .navbar-content {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="culinary" href="culinary.html">Culinary</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="hotels.html">Hotels</a>
        </ul>
    </nav>

    <body>
        <div class="container">
            <div class="card mt-4 shadow">
                <div class="card-header text-center">
                    <h1></i> DESTINASI KOTA DENPASAR</h1>
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
                var content = "Nama Kecamatan : " + feature.properties.kecamatan + "<br>" +
                    "Status Aktif Covid : " + feature.properties.aktif + "<br>" +
                    "Jumlah Meninggal : " + feature.properties.meninggal + "<br>" +
                    "Jumlah Sembuh : " + feature.properties.sembuh + "<br>" +
                    "<img src= 'gambar/sleman.png' width='50', height='50'>";

                layer.on({
                    click: function (e) {
                        wfsgeoserver1.bindPopup(content).openPopup();
                    },
                    mouseover: function (e) {
                        wfsgeoserver1
                            .bindTooltip(feature.properties.kecamatan)
                            .openTooltip();
                    },
                    mouseout: function (e) {
                        wfsgeoserver1.closePopup();
                        wfsgeoserver1.closeTooltip();
                    },
                });
            },
        });


        $.getJSON("gktourism.php", function (data) {
            gktourism.addData(data);
            map.addLayer(gktourism);
            map.fitBounds(gktourism.getBounds());

            // Style and Popup handling
            wfsgeoserver1.eachLayer(function (layer) {
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
        var map = L.map("map").setView([-8.6500, 115.2167], 12);

        /* Image Legend */
        L.Control.Legend = L.Control.extend({
            onAdd: function (map) {
                var img = L.DomUtil.create('img');
                img.src = 'assets/img/legend/legend3.png';
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
                img.src = 'assets/img/logo/LOGO_SIG_BLUE.png';
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
        
        $sql = "SELECT * FROM wisata_denpasar";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $lat = $row["latitude"];
                $long = $row["longitude"];
                $info = $row["nama_wsiata"];
                echo "L.marker([$lat, $long]).addTo(map).bindPopup('$info');";
            } 
        }
        else {
            echo "0 results";
        }
            $conn->close();
    ?>


        /* Judul dan Subjudul */
        var title = new L.Control();
        title.onAdd = function (map) {
            this._div = L.DomUtil.create('div', 'info');
            this.update();
            return this._div;

        };

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
            "Moyudan": marker1,
            "Minggir": marker2,
            "Sayegan": marker3,
            "Godean": marker4,
            "Gamping": marker5,
        };

        L.control.layers(baseMaps, overlayMaps, { collapsed: false }).addTo(map);

        // Plugin Search
        var searchControl = new L.Control.Search({
            position: "topleft",
            layer: wfsgeoserver1, //Nama variabel layer
            propertyName: "kecamatan", //Field untuk pencarian
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

        /*Plugin Measurement Tool */
        var measureControl = new L.Control.Measure({
            position: "topleft",
            primaryLengthUnit: "meters",
            secondaryLengthUnit: "kilometers",
            primaryAreaUnit: "hectares",
            secondaryAreaUnit: "sqmeters",
            activeColor: "#FF0000",
            completedColor: "#00FF00",
        });
        measureControl.addTo(map);

        /*Plugin EasyPrint */
        L.easyPrint({
            title: "Print",
        }).addTo(map);

        /*Plugin Routing*/
        L.Routing.control({
            waypoints: [
                L.latLng(-7.7438194, 110.347711),
                L.latLng(-7.6868734, 110.339323)
            ],
            routeWhileDragging: true
        }).addTo(map);

        /* Layer Marker */
        var addressPoints = [
            [-7.768611, 110.3686033, "RSUP Dr. Sardjito"],
            [-7.777232, 110.3735941, "RS Panti Rapih"],
            [-7.7839847, 110.3751158, "RS Bethesda Yogyakarta"]
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

    <div class="container-fluid">
        <h1></h1>
        <p style="text-align:center">Dinas Kesehatan Kabupaten Sleman mengeluarkan peta epidemologi Covid-19 per 30
            Desember 2020. Dari peta epidemologi, beberapa kecamatan di Kabupaten Sleman masuk kategori zona merah
            Covid-19. Dari peta epidemologi Covid-19 per 30 Desember 2020 tampak 2 kecamatan di Kabupaten Sleman
            berwarna merah. Di keterangan legenda peta, tertulis warna krem risiko penularan rendah, warna oranye risiko
            penularan sedang. Sedangkan warna merah berarti risiko penularan tinggi. Zona merah meliputi Kecamatan
            (Kapanewon) Sleman dan Depok. Kecamatan yang masuk zona oranye meliputi Kecamatan Tempel, Mlati, Ngaglik,
            Ngemplak. Kemudian terdapat dua kecamatan yang masuk dalam zona krem yakni Kecamatan Turi, Pakem,
            Cangkringan, Sayegan, Godean, Minggir, Moyudan, Gamping, Kalasan, Berbah, Prambanan.
            Lonjakan kasus Covid-19 di Kabupaten Sleman mulai pertengahan November 2020. Lonjakan kasus masih berlanjut
            sampai di akhir Desember 2020. Pemerintah Kabupaten Sleman terus mendorong dan mengharapkan masyarakat untuk
            disiplin menerapkan protokol kesehatan sesuai Perbup Nomor 37.1 Tahun 2020 tentang Penerapan Disiplin Dan
            Penegakan Hukum Protokol Kesehatan Sebagai Upaya Pencegahan dan Pengendalian Corona Virus Disease 2019
            (Covid-19)
        </p>
    <div class="text-center mt-2">
        <small class="text-secondary">Departemen Teknologi Kebumian | Sistem Informasi Geografis</small>
    </div>

</body>

</html>