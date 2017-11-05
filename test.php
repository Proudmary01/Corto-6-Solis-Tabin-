<?php

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php";

?>
<?php require_once "inc/footer.php"; ?>

<script>
    var loc = [];

    <?php
        /* lanzamos la consulta para traernos el nombre de la imagen, en nuestro caso
        el campo ruta_imagen se encuentra en la tabla usuarios */
        $result = $con->prepare("SELECT * FROM locations", array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));
        $result-> execute();
        $i = 0;
        foreach ($result as $key) {
        $lat = $key["lat"];
        $lng = $key["lng"];
        echo"loc[$i]= {location: {lat: $lat, lng: $lng}};";        
        $i++;
        }
    ?>

    
    console.log(loc);
</script>


