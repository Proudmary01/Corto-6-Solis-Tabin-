<?php

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Procesar Excel</title>
        <?php require_once "inc/header.php"; ?>
    </head>
    <body>
      <div class="uk-section uk-container">
        <?php
          // Recibo los datos de la imagen
          $nombre_excel = $_FILES['excelFile']['name'];
          
          $tipo = $_FILES['excelFile']['type'];
          $tamano = $_FILES['excelFile']['size'];
          //Si existe imagen y tiene un tamaño correcto
          if ($nombre_excel == !NULL)
          {
           //indicamos los formatos que permitimos subir a nuestro servidor
           if (($_FILES["excelFile"]["type"] == "application/vnd.ms-excel")
           || ($_FILES["excelFile"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"))
           {
              // Ruta donde se guardarán las imágenes que subamos
              $directorio = $_SERVER['DOCUMENT_ROOT'].'/corto5/intranet/uploads/';
              // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
              move_uploaded_file($_FILES['excelFile']['tmp_name'],$directorio.$nombre_excel);
              
            include 'inc/simplexlsx.class.php';
              
            $xlsx = new SimpleXLSX($directorio.$nombre_excel);
            /* en pasos anteriores deberíamos tener una conexión abierta a nuestra base de
              datos para ejecutar nuestra sentencia SQL */
              /* con la siguiente sentencia le asignamos a nuestro campo de la tabla ruta_imagen
              el nombre de nuestra imagen */
            $stmt = $con->prepare( "INSERT IGNORE INTO locations VALUES (?, ?)");
            $stmt->bindParam( 1, $latitud);
            $stmt->bindParam( 2, $longitud);
            foreach ($xlsx->rows() as $fields)
            {
                $latitud = $fields[0];
                $longitud = $fields[1];
                $stmt->execute();
            }

              


              /* volvemos a la página principal para cargar la imagen que hemos subido */
              header("Location: map.php");
            }
            else
            {
               //si no cumple con el formato
               echo "Ocurrio un error.";
                echo '<br /><br /><a href="importData.php"><button class="uk-button uk-button-danger">Regresar</button></a>';
            }
          }
          else
          {
            echo "No subio ningun archivo.";
            echo '<br /><br /><a href="importData.php"><button class="uk-button uk-button-danger">Regresar</button></a>';
          }
         ?>
      </div>
      <?php require_once "inc/footer.php"; ?>
    </body>
</html>
