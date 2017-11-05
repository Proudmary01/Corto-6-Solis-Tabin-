<?php 

	// Allow the config
	define('__CONFIG__', true);

	// Require the config
	require_once "../inc/config.php"; 

	if($_SERVER['REQUEST_METHOD'] == 'POST' or 1==1) {
		// Always return JSON format
		// header('Content-Type: application/json');

		$return = [];

		$lat = Filter::Double( $_POST['lat'] );
		$lng = Filter::Double( $_POST['lng'] );
        
        //Si existe imagen y tiene un tamaño correcto
        if (($lat == !NULL) && ($lng == !NULL))
        {
         
            $sql = $con->query("INSERT IGNORE INTO locations VALUES ('$lat','$lng')");

            /* volvemos a la página principal para cargar la imagen que hemos subido */
            //header("Location: imagenesPerfil.php");
            $return['redirect'] = 'map.php';
            echo json_encode($return, JSON_PRETTY_PRINT); exit;

        }
        


			//No lo encontro.
			//$return['error'] = "Account doesn't exists";
			//$return['is_logged_in'] = false;
		

		
	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('Invalid URL');
	}
?>
