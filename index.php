<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>
<style>
  body {
    height: 100%;
    width: 100%;
  }

  #map {
    position: absolute;
    top: 0;
    bottom: 0;
    width: 100%;

  }
</style>


<body>

  <div id="map"></div>

</body>

<script>

  /*function ifaddschrank(a) {

    var marker = L.marker(a.latlng).addTo(map);
    var ll = a.latlng.toString();


    const response = confirm("Bücherschrank bei " + ll + " einfügen?");



    if (!response) {
      marker.remove();
    }
    else {
      //nothing
    }


  }*/
  var map = L.map('map').setView([51.468, 9.514], 7);

  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);

  <?php

  /*
  $myfile = fopen("newfile.txt", "w");
  $txt = "John Done\n";
  fwrite($myfile, $txt);
  $txt = "Jane Doe\n";
  fwrite($myfile, $txt);

  $myfile = fopen("newfile.txt", "r");

  while(! feof($myfile)) {
    $line = fgets($myfile);
    echo $line. "<br>";
  }


  fclose($myfile);
  */


  $myfile = fopen("newfile.txt", "r");

  while (!feof($myfile)) {
    $line = fgets($myfile);
    echo $line;
  }
  fclose($myfile);

  function writetoFile($temp)
  {
    $myfile = fopen("newfile.txt", "a");
    $txt = $temp;
    fwrite($myfile, $txt);
    fclose($myfile);
  }

  ?>


  var popup = L.popup();

  function onMapClick(e) {
    var latlng = e.latlng;
    var llstring = e.latlng.toString();
    var string = llstring.replace('LatLng(', '').replace(')', '');
    popup
      .setLatLng(latlng)
      .setContent('<a href="index.php?latlng=' + string + '">Bücherschrank hinzufügen?</a>')
      //.click(ifaddschrank(e))
      .openOn(map);

    <?php

    if ($_GET['latlng'] != '') {
      $myfile = fopen("newfile.txt", "a");
      $txt = 'var marker36 = L.marker([' . $_GET['latlng'] . ']).addTo(map);';
      fwrite($myfile, $txt . "\n");
      fclose($myfile);
      
      
    }

    echo "}map.on('click', onMapClick);</script>";

    if($_GET['latlng'] != '') {
      echo '<meta http-equiv="refresh" content="1;url=/index.php" />';
    }
    ?>
  





</html>