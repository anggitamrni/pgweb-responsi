<?php
// $wfsUrl =
file_get_contents("http://localhost:8080/geoserver/diy/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=diy%3AADMINISTRASI_LN_25K&maxFeatures=50&outputFormat=application%2Fjson");

# Ubah URL pada file_get_contents sesuai alamat file pada geoserver
$wfsUrl =
    file_get_contents("http://localhost:8080/geoserver/diy/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=diy%3AADMINISTRASI_LN_25K&maxFeatures=50&outputFormat=application%2Fjson");

header('Content-type: application/json');
echo ($wfsUrl);
# Jika terdapat &maxFeatures=50 pada url wfs geojson, dihapus supaya jumlah feature tidak dibatasi
?>
