<?php

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php";

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Mapa de la Ciudad de Guatemala</title>
    <?php require_once "inc/header.php"; ?>
  </head>
  <body>
    <div class="container">
      <div class="options-box">
        <p><a class="uk-button uk-button-primary" href="index.php">Volver</a></p>
        <h1>
          Panel de Visualización
        </h1>
        <div id="data">
          <input class="uk-input uk-form-width-medium uk-form-medium" type="button" id="show-listings" value="Mostrar">
          <input class="uk-input uk-form-width-medium uk-form-medium" type="button" id="hide-listings" value="Ocultar">
        </div>
      </div>
      <div id="map"></div>
    </div>
    <?php require_once "inc/footer.php"; ?>
    <script>
       var map;
       var markers = [];

      var locations = [];

       function initMap() {
        map = new google.maps.Map($('#map')[0], {
          zoom: 13,
          center: new google.maps.LatLng(14.634915,-90.506882) //Ciudad Capital.
        });

        /*var locations = [
          {title: 'Universidad Rafael Landívar', location: {lat: 14.605841, lng: -90.473829}},
          {title: 'Universidad de San Carlos de Guatemala', location: {lat: 14.588188, lng: -90.551652}},
          {title: 'Universidad Francisco Marroquín', location: {lat: 14.606868, lng: -90.505406}},
          {title: 'Universidad del Valle de Guatemala', location: {lat: 14.603762, lng: -90.489248}}
        ];*/

        <?php
          /* lanzamos la consulta para traernos el nombre de la imagen, en nuestro caso
          el campo ruta_imagen se encuentra en la tabla usuarios */
          $result = $con->prepare("SELECT * FROM locations", array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));
          $result-> execute();
          $i = 0;
          foreach ($result as $key) {
            $lat = $key["lat"];
            $lng = $key["lng"];
            echo"locations[$i]= {location: {lat: $lat, lng: $lng}};";        
            $i++;
          }
        ?>

        var largeInfoWindow = new google.maps.InfoWindow();
        
        for(var i=0; i< locations.length; i++){
          var title  = locations[i].title;
          var position = locations[i].location;
          
          var marker = new google.maps.Marker({
            title: title,
            position: position,
            animation: google.maps.Animation.DROP,
            id: i
          });

          markers.push(marker);
          marker.addListener('click', function(){
            populateInfoWindow(this, largeInfoWindow);
          });
        }

        $('#show-listings').on('click', function (){
        var bounds = new google.maps.LatLngBounds();
        for(var i=0; i< locations.length; i++){
          markers[i].setMap(map);
          bounds.extend(markers[i].position);
        }
        map.fitBounds(bounds);
      });
        $('#hide-listings').on('click', function (){
        for(var i=0; i< locations.length; i++){
          markers[i].setMap(null);
        }
      });
      }

      function populateInfoWindow(marker, infowindow){
        //if(infowindow.marker != marker){
          infowindow.marker = marker;
          infowindow.setContent('<div>'+marker.position+'</div>');
          infowindow.open(map, marker);
          infowindow.addListener('closeclick', function(){
            infowindow.setMarker = null;
          });
        //}
      }
    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA17PS-aG2M2gnbdqyyOMqQ1jqPeBbnwFM&callback=initMap">
    </script>
  </body>
</html>