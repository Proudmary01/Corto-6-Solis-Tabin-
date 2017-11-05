<?php

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cargar Datos</title>
        <?php require_once "inc/header.php"; ?>
    </head>
    <body>
        <div class="uk-section uk-container">
            <p>
                <a href="index.php"><button class="uk-button uk-button-secondary">Volver</button></a>
            </p>
            <form action="procesarExcel.php" enctype="multipart/form-data" method="post">
                <label class="uk-form-label"><b>Cargar Excel</b></label>
                    <div class="uk-margin" uk-margin>
                        <div uk-form-custom="target: true">
                            <input id="excelFile" name="excelFile" size="30" type="file" />
                            <input class="uk-input uk-form-width-large" type="text" placeholder="Select file" disabled>
                        </div>
                        <input class="uk-button uk-button-default" type="submit" value="Enviar" />
                    </div>
                </div>            
            </form>
        </div>
        <?php require_once "inc/footer.php"; ?>
    </body>
</html>
